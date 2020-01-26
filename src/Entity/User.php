<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employee", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Employee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserRight")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserRight;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Purchase", mappedBy="CreatedBy")
     */
    private $Purchases;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sale", mappedBy="CreatedBy")
     */
    private $Sales;

    public function __construct()
    {
        $this->CreatedBy = new ArrayCollection();
        $this->Purchases = new ArrayCollection();
        $this->Sales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): self
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->Employee;
    }

    public function setEmployee(Employee $Employee): self
    {
        $this->Employee = $Employee;

        return $this;
    }

    public function getUserRight(): ?UserRight
    {
        return $this->UserRight;
    }

    public function setUserRight(?UserRight $UserRight): self
    {
        $this->UserRight = $UserRight;

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
            $purchase->setCreatedBy($this);
        }

        return $this;
    }

    public function removePurchase(Purchase $purchase): self
    {
        if ($this->Purchases->contains($purchase)) {
            $this->Purchases->removeElement($purchase);
            // set the owning side to null (unless already changed)
            if ($purchase->getCreatedBy() === $this) {
                $purchase->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sale[]
     */
    public function getSales(): Collection
    {
        return $this->Sales;
    }

    public function addSale(Sale $sale): self
    {
        if (!$this->Sales->contains($sale)) {
            $this->Sales[] = $sale;
            $sale->setCreatedBy($this);
        }

        return $this;
    }

    public function removeSale(Sale $sale): self
    {
        if ($this->Sales->contains($sale)) {
            $this->Sales->removeElement($sale);
            // set the owning side to null (unless already changed)
            if ($sale->getCreatedBy() === $this) {
                $sale->setCreatedBy(null);
            }
        }

        return $this;
    }
}
