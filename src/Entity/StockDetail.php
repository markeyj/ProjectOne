<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockDetailRepository")
 */
class StockDetail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Item", inversedBy="Stocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdItem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stocklocation", inversedBy="Details")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdLocation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Purchase", inversedBy="Details")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PurchaseNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sale", inversedBy="Details")
     */
    private $SaleNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $Status;

    /**
     * @ORM\Column(type="float")
     */
    private $HistoricalBuyingPrice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SaleLine", inversedBy="StockDetail")
     */
    private $SaleLine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PurchaseLine", inversedBy="StockDetail")
     */
    private $PurchaseLine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdItem(): ?Item
    {
        return $this->IdItem;
    }

    public function setIdItem(?Item $IdItem): self
    {
        $this->IdItem = $IdItem;

        return $this;
    }

    public function getIdLocation(): ?Stocklocation
    {
        return $this->IdLocation;
    }

    public function setIdLocation(?Stocklocation $IdLocation): self
    {
        $this->IdLocation = $IdLocation;

        return $this;
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

    public function getSaleNumber(): ?Sale
    {
        return $this->SaleNumber;
    }

    public function setSaleNumber(?Sale $SaleNumber): self
    {
        $this->SaleNumber = $SaleNumber;

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

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getHistoricalBuyingPrice(): ?float
    {
        return $this->HistoricalBuyingPrice;
    }

    public function setHistoricalBuyingPrice(float $HistoricalBuyingPrice): self
    {
        $this->HistoricalBuyingPrice = $HistoricalBuyingPrice;

        return $this;
    }

    public function getSaleLine(): ?SaleLine
    {
        return $this->SaleLine;
    }

    public function setSaleLine(?SaleLine $SaleLine): self
    {
        $this->SaleLine = $SaleLine;

        return $this;
    }

    public function getPurchaseLine(): ?PurchaseLine
    {
        return $this->PurchaseLine;
    }

    public function setPurchaseLine(?PurchaseLine $PurchaseLine): self
    {
        $this->PurchaseLine = $PurchaseLine;

        return $this;
    }
}
