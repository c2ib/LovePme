<?php

namespace App\Entity;

use App\Repository\RegistreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegistreRepository::class)
 */
class Registre
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
    private $prix_unitaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Action::class, inversedBy="registres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $action;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="registres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stocholder;

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

    public function getPrixUnitaire(): ?float
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(float $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

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

    public function getStocholder(): ?User
    {
        return $this->stocholder;
    }

    public function setStocholder(?User $stocholder): self
    {
        $this->stocholder = $stocholder;

        return $this;
    }
}
