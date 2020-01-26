<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemWebRepository")
 */
class ItemWeb
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Item", inversedBy="ItemWeb", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdItem;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DescriptionWeb;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Web;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescriptionWeb(): ?string
    {
        return $this->DescriptionWeb;
    }

    public function setDescriptionWeb(?string $DescriptionWeb): self
    {
        $this->DescriptionWeb = $DescriptionWeb;

        return $this;
    }

    public function getWeb(): ?bool
    {
        return $this->Web;
    }

    public function setWeb(bool $Web): self
    {
        $this->Web = $Web;

        return $this;
    }
}
