<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"advert:read"}},
 * denormalizationContext={"groups"={"advert:write"}})
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 */
class Advert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @Groups("advert:read")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="string", length=128)
     */
    private $title;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="string", length=600)
     */
    private $description;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="integer")
     */
    private $mileage;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="string", length=12)
     */
    private $gearBox;

    /**
     * @Groups("advert:read")
     * @ORM\Column(type="datetime")
     */
    private $released_at;

    /**
     * @Groups("advert:read")
     * @Groups("advert:write")
     * @ORM\Column(type="string", length=15)
     */
    private $fuel;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="advert")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("advert:write")
     */
    private $garage;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="adverts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("advert:write")
     */
    private $model;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="photos")
     */
    private $photos;

    public function __construct()
    {
        $this->released_at = new \DateTime();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getGearBox(): ?string
    {
        return $this->gearBox;
    }

    public function setGearBox(string $gearBox): self
    {
        $this->gearBox = $gearBox;

        return $this;
    }

    public function getReleasedAt(): ?\DateTimeInterface
    {
        return $this->released_at;
    }

    public function setReleasedAt(\DateTimeInterface $released_at): self
    {
        $this->released_at = $released_at;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setPhotos($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getPhotos() === $this) {
                $photo->setPhotos(null);
            }
        }

        return $this;
    }
}
