<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"picture:read"}},
 *     denormalizationContext={"groups"={"picture:write"}}
 * )
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"picture:read", "advert:read", "advert:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"photo:read", "photo:write", "advert:read", "advert:write"})
     */
    private $url;

    /**
     *@ORM\Column(type="smallint")
     *@Groups({"photo:read", "photo:write", "advert:read", "advert:write"})
     */
    private $sortOrder;

    /**
     * @ORM\ManyToOne(targetEntity=Advert::class, inversedBy="photos")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("picture:read")
     */
    private $photos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getPhotos(): ?Advert
    {
        return $this->photos;
    }

    public function setPhotos(?Advert $photos): self
    {
        $this->photos = $photos;

        return $this;
    }
}
