<?php

namespace App\Entity;

use App\Repository\FitnessRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FitnessRepository::class)
 */
class Fitness
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $fitnessText;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFitnessText(): ?string
    {
        return $this->fitnessText;
    }

    public function setFitnessText(string $fitnessText): self
    {
        $this->fitnessText = $fitnessText;

        return $this;
    }
}
