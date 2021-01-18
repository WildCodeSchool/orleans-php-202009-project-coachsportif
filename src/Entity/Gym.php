<?php

namespace App\Entity;

use App\Repository\GymRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GymRepository::class)
 */
class Gym
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $gymText;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGymText(): ?string
    {
        return $this->gymText;
    }

    public function setGymText(?string $gymText): self
    {
        $this->gym�_text = $gymText;

        return $this;
    }
}
