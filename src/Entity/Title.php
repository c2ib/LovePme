<?php

namespace App\Entity;

use App\Repository\TitleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitleRepository::class)
 */
class Title
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTitle::class, inversedBy="titles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typetitle;

    /**
     * @ORM\OneToMany(targetEntity=Company::class, mappedBy="title")
     */
    private $company;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    public function __construct()
    {
        $this->company = new ArrayCollection();
    }

    public function __toString(){
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypetitle(): ?TypeTitle
    {
        return $this->typetitle;
    }

    public function setTypetitle(?TypeTitle $typetitle): self
    {
        $this->typetitle = $typetitle;

        return $this;
    }

    /**
     * @return Collection|Company[]
     */
    public function getCompany(): Collection
    {
        return $this->company;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->company->contains($company)) {
            $this->company[] = $company;
            $company->setTitle($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->company->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getTitle() === $this) {
                $company->setTitle(null);
            }
        }

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
