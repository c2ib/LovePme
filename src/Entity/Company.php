<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rcs;

    /**
     * @ORM\Column(type="integer")
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formLegal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valeurNominal;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codeValeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siteweb;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motDuPresident;

    /**
     * @ORM\OneToMany(targetEntity=Action::class, mappedBy="societe")
     */
    private $actions;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="Company", orphanRemoval=true)
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity=Ordre::class, mappedBy="idSociete", orphanRemoval=true)
     */
    private $ordres;

   /**
     * @Vich\UploadableField(mapping="company_logo", fileNameProperty="logo")
     * @var File
     */
    private $logolink;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->ordres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }
    /**
     * @return File|null
     */
    public function getLogo(): ?File
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getRcs(): ?string
    {
        return $this->rcs;
    }

    public function setRcs(string $rcs): self
    {
        $this->rcs = $rcs;

        return $this;
    }

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getFormLegal(): ?string
    {
        return $this->formLegal;
    }

    public function setFormLegal(string $formLegal): self
    {
        $this->formLegal = $formLegal;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getValeurNominal(): ?float
    {
        return $this->valeurNominal;
    }

    public function setValeurNominal(?float $valeurNominal): self
    {
        $this->valeurNominal = $valeurNominal;

        return $this;
    }

    public function getCodeValeur(): ?string
    {
        return $this->codeValeur;
    }

    public function setCodeValeur(?string $codeValeur): self
    {
        $this->codeValeur = $codeValeur;

        return $this;
    }

    public function getSiteweb(): ?string
    {
        return $this->siteweb;
    }

    public function setSiteweb(string $siteweb): self
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    public function getMotDuPresident(): ?string
    {
        return $this->motDuPresident;
    }

    public function setMotDuPresident(?string $motDuPresident): self
    {
        $this->motDuPresident = $motDuPresident;

        return $this;
    }

    /**
     * @return Collection|Action[]
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): self
    {
        if (!$this->actions->contains($action)) {
            $this->actions[] = $action;
            $action->setSociete($this);
        }

        return $this;
    }

    public function removeAction(Action $action): self
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getSociete() === $this) {
                $action->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setCompany($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getCompany() === $this) {
                $document->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ordre[]
     */
    public function getOrdres(): Collection
    {
        return $this->ordres;
    }

    public function addOrdre(Ordre $ordre): self
    {
        if (!$this->ordres->contains($ordre)) {
            $this->ordres[] = $ordre;
            $ordre->setIdSociete($this);
        }

        return $this;
    }

    public function removeOrdre(Ordre $ordre): self
    {
        if ($this->ordres->removeElement($ordre)) {
            // set the owning side to null (unless already changed)
            if ($ordre->getIdSociete() === $this) {
                $ordre->setIdSociete(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->name;
        }

    public function getLogolink(): ?string
    {
        return $this->logolink;
    }

    public function setLogolink(?string $logolink): self
    {
        $this->logolink = $logolink;

        return $this;
    }
}