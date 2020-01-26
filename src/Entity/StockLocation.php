<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockLocationRepository")
 */
class StockLocation
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
    private $LocationCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Showroom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockDetail", mappedBy="IdLocation")
     */
    private $Details;

    public function __construct()
    {
        $this->Details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationCode(): ?string
    {
        return $this->LocationCode;
    }

    public function setLocationCode(string $LocationCode): self
    {
        $this->LocationCode = $LocationCode;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getShowroom(): ?bool
    {
        return $this->Showroom;
    }

    public function setShowroom(bool $Showroom): self
    {
        $this->Showroom = $Showroom;

        return $this;
    }

    /**
     * @return Collection|StockDetail[]
     */
    public function getDetails(): Collection
    {
        return $this->Details;
    }

    public function addDetail(StockDetail $detail): self
    {
        if (!$this->Details->contains($detail)) {
            $this->Details[] = $detail;
            $detail->setIdLocation($this);
        }

        return $this;
    }

    public function removeDetail(StockDetail $detail): self
    {
        if ($this->Details->contains($detail)) {
            $this->Details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getIdLocation() === $this) {
                $detail->setIdLocation(null);
            }
        }

        return $this;
    }
}
