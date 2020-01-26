<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemRepository")
 */
class Item
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $ItemCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="float")
     */
    private $BuyingPrice;

    /**
     * @ORM\Column(type="float")
     */
    private $SellingPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Active;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Model", inversedBy="Items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ModelCode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Supplier", inversedBy="Items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $SupplierCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockDetail", mappedBy="IdItem")
     */
    private $Stocks;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ItemWeb", mappedBy="IdItem", cascade={"persist", "remove"})
     */
    private $ItemWeb;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ItemSetting", mappedBy="IdItem", cascade={"persist", "remove"})
     */
    private $ItemSetting;

    public function __construct()
    {
        $this->Stocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemCode(): ?string
    {
        return $this->ItemCode;
    }

    public function setItemCode(string $ItemCode): self
    {
        $this->ItemCode = $ItemCode;

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

    public function getBuyingPrice(): ?float
    {
        return $this->BuyingPrice;
    }

    public function setBuyingPrice(float $BuyingPrice): self
    {
        $this->BuyingPrice = $BuyingPrice;

        return $this;
    }

    public function getSellingPrice(): ?float
    {
        return $this->SellingPrice;
    }

    public function setSellingPrice(float $SellingPrice): self
    {
        $this->SellingPrice = $SellingPrice;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->Active;
    }

    public function setActive(bool $Active): self
    {
        $this->Active = $Active;

        return $this;
    }

    public function getModelCode(): ?Model
    {
        return $this->ModelCode;
    }

    public function setModelCode(?Model $ModelCode): self
    {
        $this->ModelCode = $ModelCode;

        return $this;
    }

    public function getSupplierCode(): ?Supplier
    {
        return $this->SupplierCode;
    }

    public function setSupplierCode(?Supplier $SupplierCode): self
    {
        $this->SupplierCode = $SupplierCode;

        return $this;
    }

    /**
     * @return Collection|StockDetail[]
     */
    public function getStocks(): Collection
    {
        return $this->Stocks;
    }

    public function addStock(StockDetail $stock): self
    {
        if (!$this->Stocks->contains($stock)) {
            $this->Stocks[] = $stock;
            $stock->setIdItem($this);
        }

        return $this;
    }

    public function removeStock(StockDetail $stock): self
    {
        if ($this->Stocks->contains($stock)) {
            $this->Stocks->removeElement($stock);
            // set the owning side to null (unless already changed)
            if ($stock->getIdItem() === $this) {
                $stock->setIdItem(null);
            }
        }

        return $this;
    }

    public function getItemWeb(): ?ItemWeb
    {
        return $this->ItemWeb;
    }

    public function setItemWeb(ItemWeb $ItemWeb): self
    {
        $this->ItemWeb = $ItemWeb;

        // set the owning side of the relation if necessary
        if ($ItemWeb->getIdItem() !== $this) {
            $ItemWeb->setIdItem($this);
        }

        return $this;
    }

    public function getItemSetting(): ?ItemSetting
    {
        return $this->ItemSetting;
    }

    public function setItemSetting(ItemSetting $ItemSetting): self
    {
        $this->ItemSetting = $ItemSetting;

        // set the owning side of the relation if necessary
        if ($ItemSetting->getIdItem() !== $this) {
            $ItemSetting->setIdItem($this);
        }

        return $this;
    }
}
