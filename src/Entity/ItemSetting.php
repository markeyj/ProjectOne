<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemSettingRepository")
 */
class ItemSetting
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MinimumStock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MaximumStock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $QuantityPerOrder;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $QuantityToOrder;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PromotionPrice;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $PromotionStartDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $PromotionEndDate;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Item", inversedBy="ItemSetting", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdItem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinimumStock(): ?int
    {
        return $this->MinimumStock;
    }

    public function setMinimumStock(?int $MinimumStock): self
    {
        $this->MinimumStock = $MinimumStock;

        return $this;
    }

    public function getMaximumStock(): ?int
    {
        return $this->MaximumStock;
    }

    public function setMaximumStock(?int $MaximumStock): self
    {
        $this->MaximumStock = $MaximumStock;

        return $this;
    }

    public function getQuantityPerOrder(): ?int
    {
        return $this->QuantityPerOrder;
    }

    public function setQuantityPerOrder(?int $QuantityPerOrder): self
    {
        $this->QuantityPerOrder = $QuantityPerOrder;

        return $this;
    }

    public function getQuantityToOrder(): ?int
    {
        return $this->QuantityToOrder;
    }

    public function setQuantityToOrder(?int $QuantityToOrder): self
    {
        $this->QuantityToOrder = $QuantityToOrder;

        return $this;
    }

    public function getPromotionPrice(): ?float
    {
        return $this->PromotionPrice;
    }

    public function setPromotionPrice(?float $PromotionPrice): self
    {
        $this->PromotionPrice = $PromotionPrice;

        return $this;
    }

    public function getPromotionStartDate(): ?\DateTimeInterface
    {
        return $this->PromotionStartDate;
    }

    public function setPromotionStartDate(?\DateTimeInterface $PromotionStartDate): self
    {
        $this->PromotionStartDate = $PromotionStartDate;

        return $this;
    }

    public function getPromotionEndDate(): ?\DateTimeInterface
    {
        return $this->PromotionEndDate;
    }

    public function setPromotionEndDate(?\DateTimeInterface $PromotionEndDate): self
    {
        $this->PromotionEndDate = $PromotionEndDate;

        return $this;
    }

    public function getIdItem(): ?Item
    {
        return $this->IdItem;
    }

    public function setIdItem(Item $IdItem): self
    {
        $this->IdItem = $IdItem;

        return $this;
    }
}
