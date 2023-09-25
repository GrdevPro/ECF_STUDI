<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reparationMoteur = null;

    #[ORM\Column(length: 255)]
    private ?string $reparationCarosserie = null;

    #[ORM\Column(length: 255)]
    private ?string $venteVehicule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReparationMoteur(): ?string
    {
        return $this->reparationMoteur;
    }

    public function setReparationMoteur(string $reparationMoteur): static
    {
        $this->reparationMoteur = $reparationMoteur;

        return $this;
    }

    public function getReparationCarosserie(): ?string
    {
        return $this->reparationCarosserie;
    }

    public function setReparationCarosserie(string $reparationCarosserie): static
    {
        $this->reparationCarosserie = $reparationCarosserie;

        return $this;
    }

    public function getVenteVehicule(): ?string
    {
        return $this->venteVehicule;
    }

    public function setVenteVehicule(string $venteVehicule): static
    {
        $this->venteVehicule = $venteVehicule;

        return $this;
    }
}
