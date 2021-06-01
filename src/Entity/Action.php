<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="actions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="actions")
     */
    private $actionnaire;

    public function __construct()
    {
        $this->actionnaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSociete(): ?Company
    {
        return $this->societe;
    }

    public function setSociete(?Company $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getActionnaire(): Collection
    {
        return $this->actionnaire;
    }

    public function addActionnaire(User $actionnaire): self
    {
        if (!$this->actionnaire->contains($actionnaire)) {
            $this->actionnaire[] = $actionnaire;
        }

        return $this;
    }

    public function removeActionnaire(User $actionnaire): self
    {
        $this->actionnaire->removeElement($actionnaire);

        return $this;
    }
}
