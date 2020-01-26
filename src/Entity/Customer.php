<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
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
    private $CustomerCode;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Address")
     */
    private $Address;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Active;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sale", mappedBy="Customer")
     */
    private $IdCustomer;

    public function __construct()
    {
        $this->IdCustomer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerCode(): ?string
    {
        return $this->CustomerCode;
    }

    public function setCustomerCode(string $CustomerCode): self
    {
        $this->CustomerCode = $CustomerCode;

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

    public function getAddress(): ?Address
    {
        return $this->Address;
    }

    public function setAddress(?Address $Address): self
    {
        $this->Address = $Address;

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

    /**
     * @return Collection|Sale[]
     */
    public function getIdCustomer(): Collection
    {
        return $this->IdCustomer;
    }

    public function addIdCustomer(Sale $idCustomer): self
    {
        if (!$this->IdCustomer->contains($idCustomer)) {
            $this->IdCustomer[] = $idCustomer;
            $idCustomer->setCustomer($this);
        }

        return $this;
    }

    public function removeIdCustomer(Sale $idCustomer): self
    {
        if ($this->IdCustomer->contains($idCustomer)) {
            $this->IdCustomer->removeElement($idCustomer);
            // set the owning side to null (unless already changed)
            if ($idCustomer->getCustomer() === $this) {
                $idCustomer->setCustomer(null);
            }
        }

        return $this;
    }
}
