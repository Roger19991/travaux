<?php

namespace App\Entity;

use App\Repository\AxlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AxlesRepository::class)]
class Axles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $caracteristique = null;

    #[ORM\ManyToOne(inversedBy: 'axles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Resarchedata $resarchedata = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCaracteristique(): ?string
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(string $caracteristique): static
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getResarchedata(): ?Resarchedata
    {
        return $this->resarchedata;
    }

    public function setResarchedata(?Resarchedata $resarchedata): static
    {
        $this->resarchedata = $resarchedata;

        return $this;
    }
}
