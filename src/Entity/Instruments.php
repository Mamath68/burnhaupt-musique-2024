<?php

namespace App\Entity;

use App\Repository\InstrumentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstrumentsRepository::class)]
class Instruments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

        #[ORM\ManyToOne(inversedBy: 'instruments')]
    private ?Providers $provider = null;


    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\ManyToOne(inversedBy: 'instruments')]
    private ?Familly $familly = null;

    #[ORM\ManyToOne(inversedBy: 'instruments')]
    private ?Subfamilly $subfamilly = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

     public function getProvider(): ?Providers
    {
        return $this->provider;
    }

    public function setProvider(?Providers $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getFamilly(): ?Familly
    {
        return $this->familly;
    }

    public function setFamilly(?Familly $familly): static
    {
        $this->familly = $familly;

        return $this;
    }

    public function getSubfamilly(): ?Subfamilly
    {
        return $this->subfamilly;
    }

    public function setSubfamilly(?Subfamilly $subfamilly): static
    {
        $this->subfamilly = $subfamilly;

        return $this;
    }
}
