<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaleRepository")
 */
class Sale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $SaleNumber;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $Status;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Total;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="IdCustomer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Customer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Sales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CreatedBy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockDetail", mappedBy="SaleNumber")
     */
    private $Details;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SaleLine", mappedBy="SaleNumber")
     */
    private $SaleLines;

    public function __construct()
    {
        $this->Details = new ArrayCollection();
        $this->SaleLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleNumber(): ?int
    {
        return $this->SaleNumber;
    }

    public function setSaleNumber(int $SaleNumber): self
    {
        $this->SaleNumber = $SaleNumber;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->Total;
    }

    public function setTotal(?float $Total): self
    {
        $this->Total = $Total;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->CreationDate;
    }

    public function setCreationDate(\DateTimeInterface $CreationDate): self
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->Customer;
    }

    public function setCustomer(?Customer $Customer): self
    {
        $this->Customer = $Customer;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->CreatedBy;
    }

    public function setCreatedBy(?User $CreatedBy): self
    {
        $this->CreatedBy = $CreatedBy;

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
            $detail->setSaleNumber($this);
        }

        return $this;
    }

    public function removeDetail(StockDetail $detail): self
    {
        if ($this->Details->contains($detail)) {
            $this->Details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getSaleNumber() === $this) {
                $detail->setSaleNumber(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SaleLine[]
     */
    public function getSaleLines(): Collection
    {
        return $this->SaleLines;
    }

    public function addSaleLine(SaleLine $saleLine): self
    {
        if (!$this->SaleLines->contains($saleLine)) {
            $this->SaleLines[] = $saleLine;
            $saleLine->setSaleNumber($this);
        }

        return $this;
    }

    public function removeSaleLine(SaleLine $saleLine): self
    {
        if ($this->SaleLines->contains($saleLine)) {
            $this->SaleLines->removeElement($saleLine);
            // set the owning side to null (unless already changed)
            if ($saleLine->getSaleNumber() === $this) {
                $saleLine->setSaleNumber(null);
            }
        }

        return $this;
    }
}
