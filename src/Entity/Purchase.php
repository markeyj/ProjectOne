<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseRepository")
 */
class Purchase
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
    private $PurchaseNumber;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $Status;

    /**
     * @ORM\Column(type="float")
     */
    private $Total;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Purchases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CreatedBy;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Supplier", inversedBy="Purchases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Supplier;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockDetail", mappedBy="PurchaseNumber")
     */
    private $Details;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseLine", mappedBy="PurchaseNumber")
     */
    private $PurchaseLines;

    public function __construct()
    {
        $this->Details = new ArrayCollection();
        $this->PurchaseLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchaseNumber(): ?int
    {
        return $this->PurchaseNumber;
    }

    public function setPurchaseNumber(int $PurchaseNumber): self
    {
        $this->PurchaseNumber = $PurchaseNumber;

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

    public function setTotal(float $Total): self
    {
        $this->Total = $Total;

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

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->CreationDate;
    }

    public function setCreationDate(\DateTimeInterface $CreationDate): self
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->Supplier;
    }

    public function setSupplier(?Supplier $Supplier): self
    {
        $this->Supplier = $Supplier;

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
            $detail->setPurchaseNumber($this);
        }

        return $this;
    }

    public function removeDetail(StockDetail $detail): self
    {
        if ($this->Details->contains($detail)) {
            $this->Details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getPurchaseNumber() === $this) {
                $detail->setPurchaseNumber(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PurchaseLine[]
     */
    public function getPurchaseLines(): Collection
    {
        return $this->PurchaseLines;
    }

    public function addPurchaseLine(PurchaseLine $purchaseLine): self
    {
        if (!$this->PurchaseLines->contains($purchaseLine)) {
            $this->PurchaseLines[] = $purchaseLine;
            $purchaseLine->setPurchaseNumber($this);
        }

        return $this;
    }

    public function removePurchaseLine(PurchaseLine $purchaseLine): self
    {
        if ($this->PurchaseLines->contains($purchaseLine)) {
            $this->PurchaseLines->removeElement($purchaseLine);
            // set the owning side to null (unless already changed)
            if ($purchaseLine->getPurchaseNumber() === $this) {
                $purchaseLine->setPurchaseNumber(null);
            }
        }

        return $this;
    }
}
