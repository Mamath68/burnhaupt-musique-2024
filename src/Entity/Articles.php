<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Providers $provider = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stock = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Instruments $instruments = null;

    public function getId(): ?int
    {
        return $this->id;
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


    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(?string $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getInstruments(): ?Instruments
    {
        return $this->instruments;
    }

    public function setInstruments(?Instruments $instruments): static
    {
        $this->instruments = $instruments;

        return $this;
    }
}
