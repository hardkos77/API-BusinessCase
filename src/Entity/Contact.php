<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"contact:read"}},
 * denormalizationContext={"groups"={"contact:write"}})
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @Groups("contact:read")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("contact:read")
     * @Groups("contact:write")
     * @ORM\Column(type="string", length=50)
     */
    private $firstName;

    /**
     * @Groups("contact:read")
     * @Groups("contact:write")
     * @ORM\Column(type="string", length=50)
     */
    private $lastName;

    /**
     * @Groups("contact:read")
     * @Groups("contact:write")
     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     * @Groups("contact:read")
     * @Groups("contact:write")
     * @ORM\Column(type="string", length=20)
     */
    private $phone;

    /**
     * @Groups("contact:read")
     * @Groups("contact:write")
     * @ORM\Column(type="string", length=10)
     */
    private $reference;

    /**
     * @Groups("contact:read")
     * @Groups("contact:write")
     * @ORM\Column(type="string", length=600)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
