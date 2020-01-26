<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupplierRepository")
 */
class Supplier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $SupplierCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MailAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PhoneNumber;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Active;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address")
     */
    private $Address;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address", inversedBy="Suppliers")
     */
    private $OrderAdress;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Purchase", mappedBy="Supplier")
     */
    private $Purchases;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Model", mappedBy="Supplier")
     */
    private $Models;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="SupplierCode")
     */
    private $Items;

    public function __construct()
    {
        $this->Purchases = new ArrayCollection();
        $this->Models = new ArrayCollection();
        $this->Items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupplierCode(): ?string
    {
        return $this->SupplierCode;
    }

    public function setSupplierCode(string $SupplierCode): self
    {
        $this->SupplierCode = $SupplierCode;

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

    public function getMailAddress(): ?string
    {
        return $this->MailAddress;
    }

    public function setMailAddress(?string $MailAddress): self
    {
        $this->MailAddress = $MailAddress;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(?string $PhoneNumber): self
    {
        $this->PhoneNumber = $PhoneNumber;

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

    public function getAddress(): ?Address
    {
        return $this->Address;
    }

    public function setAddress(?Address $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getOrderAdress(): ?Address
    {
        return $this->OrderAdress;
    }

    public function setOrderAdress(?Address $OrderAdress): self
    {
        $this->OrderAdress = $OrderAdress;

        return $this;
    }

    /**
     * @return Collection|Purchase[]
     */
    public function getPurchases(): Collection
    {
        return $this->Purchases;
    }

    public function addPurchase(Purchase $purchase): self
    {
        if (!$this->Purchases->contains($purchase)) {
            $this->Purchases[] = $purchase;
            $purchase->setSupplier($this);
        }

        return $this;
    }

    public function removePurchase(Purchase $purchase): self
    {
        if ($this->Purchases->contains($purchase)) {
            $this->Purchases->removeElement($purchase);
            // set the owning side to null (unless already changed)
            if ($purchase->getSupplier() === $this) {
                $purchase->setSupplier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Model[]
     */
    public function getModels(): Collection
    {
        return $this->Models;
    }

    public function addModel(Model $model): self
    {
        if (!$this->Models->contains($model)) {
            $this->Models[] = $model;
            $model->setSupplier($this);
        }

        return $this;
    }

    public function removeModel(Model $model): self
    {
        if ($this->Models->contains($model)) {
            $this->Models->removeElement($model);
            // set the owning side to null (unless already changed)
            if ($model->getSupplier() === $this) {
                $model->setSupplier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->Items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->Items->contains($item)) {
            $this->Items[] = $item;
            $item->setSupplierCode($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->Items->contains($item)) {
            $this->Items->removeElement($item);
            // set the owning side to null (unless already changed)
            if ($item->getSupplierCode() === $this) {
                $item->setSupplierCode(null);
            }
        }

        return $this;
    }
}
