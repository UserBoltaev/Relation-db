<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitiesRepository::class)]
#[ApiResource]
class Cities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'cities', targetEntity: Countries::class)]
    private $countries;

    #[ORM\ManyToOne(targetEntity: Companies::class, inversedBy: 'cities')]
    #[ORM\JoinColumn(nullable: false)]
    private $companies;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
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

    /**
     * @return Collection<int, Countries>
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Countries $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->setCities($this);
        }

        return $this;
    }

    public function removeCountry(Countries $country): self
    {
        if ($this->countries->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getCities() === $this) {
                $country->setCities(null);
            }
        }

        return $this;
    }

    public function getCompanies(): ?Companies
    {
        return $this->companies;
    }

    public function setCompanies(?Companies $companies): self
    {
        $this->companies = $companies;

        return $this;
    }
}
