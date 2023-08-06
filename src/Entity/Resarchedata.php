<?php

namespace App\Entity;

use App\Repository\ResarcheDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResarcheDataRepository::class)]
class ResarcheData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $modification_date = null;

    #[ORM\Column]
    private ?float $trafic_statistique = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start_periode = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end_periode = null;

    #[ORM\OneToMany(mappedBy: 'resarchedata', targetEntity: axles::class, orphanRemoval: true)]
    private Collection $axles;

    public function __construct()
    {
        $this->axles = new ArrayCollection();
    }

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

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modification_date;
    }

    public function setModificationDate(\DateTimeInterface $modification_date): static
    {
        $this->modification_date = $modification_date;

        return $this;
    }

    public function getTraficStatistique(): ?float
    {
        return $this->trafic_statistique;
    }

    public function setTraficStatistique(float $trafic_statistique): static
    {
        $this->trafic_statistique = $trafic_statistique;

        return $this;
    }

    public function getStartPeriode(): ?\DateTimeInterface
    {
        return $this->start_periode;
    }

    public function setStartPeriode(\DateTimeInterface $start_periode): static
    {
        $this->start_periode = $start_periode;

        return $this;
    }

    public function getEndPeriode(): ?\DateTimeInterface
    {
        return $this->end_periode;
    }

    public function setEndPeriode(\DateTimeInterface $end_periode): static
    {
        $this->end_periode = $end_periode;

        return $this;
    }

    /**
     * @return Collection<int, axles>
     */
    public function getAxles(): Collection
    {
        return $this->axles;
    }

    public function addAxle(axles $axle): static
    {
        if (!$this->axles->contains($axle)) {
            $this->axles->add($axle);
            $axle->setResarchedata($this);
        }

        return $this;
    }

    public function removeAxle(axles $axle): static
    {
        if ($this->axles->removeElement($axle)) {
            // set the owning side to null (unless already changed)
            if ($axle->getResarchedata() === $this) {
                $axle->setResarchedata(null);
            }
        }

        return $this;
    }
}