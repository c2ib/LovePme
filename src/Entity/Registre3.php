<?php

namespace App\Entity;

use App\Repository\Registre3Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Registre3Repository::class)
 */
class Registre3
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_unik;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Action::class, inversedBy="registre3s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $action;

    /**
     * @ORM\ManyToOne(targetEntity=USer::class, inversedBy="registre3s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stockholder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrixUnik(): ?float
    {
        return $this->prix_unik;
    }

    public function setPrixUnik(float $prix_unik): self
    {
        $this->prix_unik = $prix_unik;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAction(): ?Action
    {
        return $this->action;
    }

    public function setAction(?Action $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getStockholder(): ?USer
    {
        return $this->stockholder;
    }

    public function setStockholder(?USer $stockholder): self
    {
        $this->stockholder = $stockholder;

        return $this;
    }

}
