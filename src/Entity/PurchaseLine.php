<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseLineRepository")
 */
class PurchaseLine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Purchase", inversedBy="PurchaseLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PurchaseNumber;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockDetail", mappedBy="PurchaseLine")
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

    /**
     * @ORM\Column(type="integer")
     */
    private $LineNumber;

    public function __construct()
    {
        $this->StockDetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchaseNumber(): ?Purchase
    {
        return $this->PurchaseNumber;
    }

    public function setPurchaseNumber(?Purchase $PurchaseNumber): self
    {
        $this->PurchaseNumber = $PurchaseNumber;

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
            $stockDetail->setPurchaseLine($this);
        }

        return $this;
    }

    public function removeStockDetail(StockDetail $stockDetail): self
    {
        if ($this->StockDetail->contains($stockDetail)) {
            $this->StockDetail->removeElement($stockDetail);
            // set the owning side to null (unless already changed)
            if ($stockDetail->getPurchaseLine() === $this) {
                $stockDetail->setPurchaseLine(null);
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

    public function getLineNumber(): ?int
    {
        return $this->LineNumber;
    }

    public function setLineNumber(int $LineNumber): self
    {
        $this->LineNumber = $LineNumber;

        return $this;
    }
}
