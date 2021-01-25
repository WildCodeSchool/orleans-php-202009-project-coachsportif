<?php

namespace App\Entity;

use App\Repository\CgvRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CgvRepository::class)
 */
class Cgv
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
    private ?string $textCgv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextCgv(): ?string
    {
        return $this->textCgv;
    }

    public function setTextCgv(string $textCgv): self
    {
        $this->textCgv = $textCgv;

        return $this;
    }
}
