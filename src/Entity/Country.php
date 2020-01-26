<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $CodeISO;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\City", mappedBy="Country")
     */
    private $IdCountry;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DescriptionEn;

    public function __construct()
    {
        $this->IdCountry = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeISO(): ?string
    {
        return $this->CodeISO;
    }

    public function setCodeISO(string $CodeISO): self
    {
        $this->CodeISO = $CodeISO;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|City[]
     */
    public function getIdCountry(): Collection
    {
        return $this->IdCountry;
    }

    public function addIdCountry(City $idCountry): self
    {
        if (!$this->IdCountry->contains($idCountry)) {
            $this->IdCountry[] = $idCountry;
            $idCountry->setCountry($this);
        }

        return $this;
    }

    public function removeIdCountry(City $idCountry): self
    {
        if ($this->IdCountry->contains($idCountry)) {
            $this->IdCountry->removeElement($idCountry);
            // set the owning side to null (unless already changed)
            if ($idCountry->getCountry() === $this) {
                $idCountry->setCountry(null);
            }
        }

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->DescriptionEn;
    }

    public function setDescriptionEn(string $DescriptionEn): self
    {
        $this->DescriptionEn = $DescriptionEn;

        return $this;
    }
}
