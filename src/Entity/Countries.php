<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CountriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountriesRepository::class)]
#[ApiResource]
class Countries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $population;

    #[ORM\Column(type: 'integer')]
    private $gdp;

    #[ORM\ManyToOne(targetEntity: Cities::class, inversedBy: 'countries')]
    #[ORM\JoinColumn(nullable: false)]
    private $cities;

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

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getGdp(): ?int
    {
        return $this->gdp;
    }

    public function setGdp(int $gdp): self
    {
        $this->gdp = $gdp;

        return $this;
    }

    public function getCities(): ?Cities
    {
        return $this->cities;
    }

    public function setCities(?Cities $cities): self
    {
        $this->cities = $cities;

        return $this;
    }
}
