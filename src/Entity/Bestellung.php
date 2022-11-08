<?php

namespace App\Entity;

use App\Repository\BestellungRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BestellungRepository::class)]
class Bestellung
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tisch = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bestellNummer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $preis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTisch(): ?string
    {
        return $this->tisch;
    }

    public function setTisch(?string $tisch): self
    {
        $this->tisch = $tisch;

        return $this;
    }

    public function getBestellNummer(): ?string
    {
        return $this->bestellNummer;
    }

    public function setBestellNummer(?string $bestellNummer): self
    {
        $this->bestellNummer = $bestellNummer;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPreis(): ?string
    {
        return $this->preis;
    }

    public function setPreis(?string $preis): self
    {
        $this->preis = $preis;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
