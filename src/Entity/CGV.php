<?php

namespace App\Entity;

use App\Repository\CGVRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CGVRepository::class)
 */
class CGV
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
    private ?string $textCvg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocument(): ?string
    {
        return $this->textCvg;
    }

    public function setDocument(string $textCvg): self
    {
        $this->textCvg = $textCvg;

        return $this;
    }
}
