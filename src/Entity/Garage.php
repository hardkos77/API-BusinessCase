<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"garage:read"}},
 * denormalizationContext={"groups"={"garage:write"}})
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
class Garage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @Groups({"garage:read", "advert:read", "user:read"})
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"garage:read", "garage:write"})
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @Groups({"garage:read", "garage:write"})
     * @ORM\Column(type="string", length=10)
     */
    private $zipCode;

    /**
     * @Groups({"garage:read", "garage:write"})
     * @ORM\Column(type="string", length=64)
     */
    private $city;

    /**
     * @Groups({"garage:read", "garage:write"})
     * @ORM\Column(type="string", length=16)
     */
    private $phone;

    /**
     * @Groups({"garage:read", "garage:write", "advert:read", "user:read"})
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="garages")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("garage:write")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Advert::class, mappedBy="garage")
     * @Groups("garage:read")
     */
    private $advert;

    public function __construct()
    {
        $this->advert = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdvert(): Collection
    {
        return $this->advert;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->advert->contains($advert)) {
            $this->advert[] = $advert;
            $advert->setGarage($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->advert->removeElement($advert)) {
            // set the owning side to null (unless already changed)
            if ($advert->getGarage() === $this) {
                $advert->setGarage(null);
            }
        }

        return $this;
    }
}
