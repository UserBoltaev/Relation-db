<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompaniesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompaniesRepository::class)]
#[ApiResource]
class Companies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $revenue;

    #[ORM\Column(type: 'integer')]
    private $labors;

    #[ORM\OneToMany(mappedBy: 'companies', targetEntity: Cities::class)]
    private $cities;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

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

    public function getRevenue(): ?int
    {
        return $this->revenue;
    }

    public function setRevenue(int $revenue): self
    {
        $this->revenue = $revenue;

        return $this;
    }

    public function getLabors(): ?int
    {
        return $this->labors;
    }

    public function setLabors(int $labors): self
    {
        $this->labors = $labors;

        return $this;
    }

    /**
     * @return Collection<int, Cities>
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(Cities $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setCompanies($this);
        }

        return $this;
    }

    public function removeCity(Cities $city): self
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getCompanies() === $this) {
                $city->setCompanies(null);
            }
        }

        return $this;
    }
}
