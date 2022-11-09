<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeRepository::class)]
class Liste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $strasse = null;

    #[ORM\Column(length: 255)]
    private ?string $plz = null;

    #[ORM\Column(length: 255)]
    private ?string $stadt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telefon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $geburtsdatum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gastEintrag = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getPlz(): ?string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getStadt(): ?string
    {
        return $this->stadt;
    }

    public function setStadt(string $stadt): self
    {
        $this->stadt = $stadt;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(?string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGeburtsdatum(): ?string
    {
        return $this->geburtsdatum;
    }

    public function setGeburtsdatum(?string $geburtsdatum): self
    {
        $this->geburtsdatum = $geburtsdatum;

        return $this;
    }

    public function getGastEintrag(): ?string
    {
        return $this->gastEintrag;
    }

    public function setGastEintrag(?string $gastEintrag): self
    {
        $this->gastEintrag = $gastEintrag;

        return $this;
    }
}
