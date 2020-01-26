<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaleLineRepository")
 */
class SaleLine
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
    private $LineNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sale", inversedBy="SaleLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $SaleNumber;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockDetail", mappedBy="SaleLine")
     */
    private $StockDetail;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $UnitPrice;

    public function __construct()
    {
        $this->StockDetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLineNumber(): ?int
    {
        return $this->LineNumber;
    }

    public function setLineNumber(int $LineNumber): self
    {
        $this->LineNumber = $LineNumber;

        return $this;
    }

    public function getSaleNumber(): ?Sale
    {
        return $this->SaleNumber;
    }

    public function setSaleNumber(?Sale $SaleNumber): self
    {
        $this->SaleNumber = $SaleNumber;

        return $this;
    }

    /**
     * @return Collection|StockDetail[]
     */
    public function getStockDetail(): Collection
    {
        return $this->StockDetail;
    }

    public function addStockDetail(StockDetail $stockDetail): self
    {
        if (!$this->StockDetail->contains($stockDetail)) {
            $this->StockDetail[] = $stockDetail;
            $stockDetail->setSaleLine($this);
        }

        return $this;
    }

    public function removeStockDetail(StockDetail $stockDetail): self
    {
        if ($this->StockDetail->contains($stockDetail)) {
            $this->StockDetail->removeElement($stockDetail);
            // set the owning side to null (unless already changed)
            if ($stockDetail->getSaleLine() === $this) {
                $stockDetail->setSaleLine(null);
            }
        }

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->UnitPrice;
    }

    public function setUnitPrice(float $UnitPrice): self
    {
        $this->UnitPrice = $UnitPrice;

        return $this;
    }
}
