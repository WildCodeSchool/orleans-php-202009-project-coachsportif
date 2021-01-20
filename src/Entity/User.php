<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private ?string $email;

    /**
     * @ORM\Column(type="json")
     */
    private array $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private string $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="255", maxMessage="Le prénom ne doit pas dépasser {{ limit }} caractères")
     */
    private ?string $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="255", maxMessage="Le nom ne doit pas dépasser {{ limit }} caractères")
     */
    private ?string $lastname;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $age;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $size;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $fatMass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $bodyWater;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $muscleMass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $armCircumference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $waistSize;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $thighCircumference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $ruffierDickstonTest;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $three;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="255", maxMessage="Le titre ne doit pas dépasser {{ limit }} caractères")
     */
    private ?string $pathology;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="255", maxMessage="Le champ ne doit pas dépasser {{ limit }} caractères")
     */
    private ?string $treatment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="255", maxMessage="Le champ ne doit pas dépasser {{ limit }} caractères")
     */
    private ?string $prescription;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private ?int $imc;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getFatMass(): ?int
    {
        return $this->fatMass;
    }

    public function setFatMass(?int $fatMass): self
    {
        $this->fatMass = $fatMass;

        return $this;
    }

    public function getBodyWater(): ?int
    {
        return $this->bodyWater;
    }

    public function setBodyWater(?int $bodyWater): self
    {
        $this->bodyWater = $bodyWater;

        return $this;
    }

    public function getMuscleMass(): ?int
    {
        return $this->muscleMass;
    }

    public function setMuscleMass(?int $muscleMass): self
    {
        $this->muscleMass = $muscleMass;

        return $this;
    }

    public function getArmCircumference(): ?int
    {
        return $this->armCircumference;
    }

    public function setArmCircumference(?int $armCircumference): self
    {
        $this->armCircumference = $armCircumference;

        return $this;
    }

    public function getWaistSize(): ?int
    {
        return $this->waistSize;
    }

    public function setWaistSize(?int $waistSize): self
    {
        $this->waistSize = $waistSize;

        return $this;
    }

    public function getThighCircumference(): ?int
    {
        return $this->thighCircumference;
    }

    public function setThighCircumference(?int $thighCircumference): self
    {
        $this->thighCircumference = $thighCircumference;

        return $this;
    }

    public function getRuffierDickstonTest(): ?int
    {
        return $this->ruffierDickstonTest;
    }

    public function setRuffierDickstonTest(?int $ruffierDickstonTest): self
    {
        $this->ruffierDickstonTest = $ruffierDickstonTest;

        return $this;
    }

    public function getThree(): ?int
    {
        return $this->three;
    }

    public function setThree(?int $three): self
    {
        $this->three = $three;

        return $this;
    }

    public function getPathology(): ?string
    {
        return $this->pathology;
    }

    public function setPathology(?string $pathology): self
    {
        $this->pathology = $pathology;

        return $this;
    }

    public function getTreatment(): ?string
    {
        return $this->treatment;
    }

    public function setTreatment(?string $treatment): self
    {
        $this->treatment = $treatment;

        return $this;
    }

    public function getPrescription(): ?string
    {
        return $this->prescription;
    }

    public function setPrescription(?string $prescription): self
    {
        $this->prescription = $prescription;

        return $this;
    }

    public function getImc(): ?int
    {
        return $this->imc;
    }

    public function setImc(?int $imc): self
    {
        $this->imc = $imc;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
