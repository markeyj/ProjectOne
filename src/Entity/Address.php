<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
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
    private $Street;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="Addresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $City;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="Address")
     */
    private $Employees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Supplier", mappedBy="OrderAdress")
     */
    private $Suppliers;

    public function __construct()
    {
        $this->Employees = new ArrayCollection();
        $this->Suppliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->Street;
    }

    public function setStreet(string $Street): self
    {
        $this->Street = $Street;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->City;
    }

    public function setCity(?City $City): self
    {
        $this->City = $City;

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getEmployees(): Collection
    {
        return $this->Employees;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!$this->Employees->contains($employee)) {
            $this->Employees[] = $employee;
            $employee->setAddress($this);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->Employees->contains($employee)) {
            $this->Employees->removeElement($employee);
            // set the owning side to null (unless already changed)
            if ($employee->getAddress() === $this) {
                $employee->setAddress(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Supplier[]
     */
    public function getSuppliers(): Collection
    {
        return $this->Suppliers;
    }

    public function addSupplier(Supplier $supplier): self
    {
        if (!$this->Suppliers->contains($supplier)) {
            $this->Suppliers[] = $supplier;
            $supplier->setOrderAdress($this);
        }

        return $this;
    }

    public function removeSupplier(Supplier $supplier): self
    {
        if ($this->Suppliers->contains($supplier)) {
            $this->Suppliers->removeElement($supplier);
            // set the owning side to null (unless already changed)
            if ($supplier->getOrderAdress() === $this) {
                $supplier->setOrderAdress(null);
            }
        }

        return $this;
    }
}
