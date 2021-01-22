<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255")
     */
    private ?string $phone;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Length(max="255")
     */
    private ?string $email;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Length(max="255")
     */
    private ?string $adress;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Length(max="255")
     */
    private ?string $codeAndCity;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCodeAndCity(): ?string
    {
        return $this->codeAndCity;
    }

    public function setCodeAndCity(string $codeAndCity): self
    {
        $this->codeAndCity = $codeAndCity;

        return $this;
    }
}
