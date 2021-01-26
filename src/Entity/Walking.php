<?php

namespace App\Entity;

use App\Repository\WalkingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use DateTime;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=WalkingRepository::class)
 * @Vich\Uploadable
 */
class Walking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $picture = '';

    /**
     * @Vich\UploadableField(mapping="walking_file", fileNameProperty="picture")
     * @var File|null
     * @Assert\File(
     *     maxSize="1000000",
     *     mimeTypes = {"image/png", "image/jpeg", "image/jpg", "image/gif",})
     */
    private ?File $pictureFile = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $updatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $pdf;

    /**
     * @Vich\UploadableField(mapping="walking_pdf", fileNameProperty="pdf")
     * @var File|null
     * @Assert\File(
     *     maxSize="3000000",
     *     mimeTypes = {"application/pdf",})
     */
    private ?File $pdfFile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setPictureFile(?File $image = null): Walking
    {
        $this->pictureFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    public function setPdf(?string $pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function setPdfFile(?File $pdf = null): Walking
    {
        $this->pdfFile = $pdf;
        if ($pdf) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getPdfFile(): ?File
    {
        return $this->pdfFile;
    }
}
