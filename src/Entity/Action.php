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
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="codeAction", orphanRemoval=true)
     */
    private $annonces;

    /**
     * @ORM\OneToMany(targetEntity=Registre::class, mappedBy="action")
     */
    private $registres;

    /**
     * @ORM\ManyToMany(targetEntity=RegistreTitre::class, mappedBy="action")
     */
    private $registreTitres;

    public function __construct()
    {
        $this->actionnaire = new ArrayCollection();
        $this->annonces = new ArrayCollection();
<<<<<<< HEAD
        $this->registres = new ArrayCollection();
=======
        $this->registreTitres = new ArrayCollection();
>>>>>>> 5bb005555c74dfbed583bc7762ecd99d32228700
    }

    public function __toString()
    {
        return $this->societe->getName();
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
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setCodeAction($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getCodeAction() === $this) {
                $annonce->setCodeAction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Registre[]
     */
    public function getRegistres(): Collection
    {
        return $this->registres;
    }

    public function addRegistre(Registre $registre): self
    {
        if (!$this->registres->contains($registre)) {
            $this->registres[] = $registre;
            $registre->setAction($this);
        }

        return $this;
    }

    public function removeRegistre(Registre $registre): self
    {
        if ($this->registres->removeElement($registre)) {
            // set the owning side to null (unless already changed)
            if ($registre->getAction() === $this) {
                $registre->setAction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RegistreTitre[]
     */
    public function getRegistreTitres(): Collection
    {
        return $this->registreTitres;
    }

    public function addRegistreTitre(RegistreTitre $registreTitre): self
    {
        if (!$this->registreTitres->contains($registreTitre)) {
            $this->registreTitres[] = $registreTitre;
            $registreTitre->addAction($this);
        }

        return $this;
    }

    public function removeRegistreTitre(RegistreTitre $registreTitre): self
    {
        if ($this->registreTitres->removeElement($registreTitre)) {
            $registreTitre->removeAction($this);
        }

        return $this;
    }
}
