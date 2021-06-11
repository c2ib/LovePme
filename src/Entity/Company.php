<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
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
     * @ORM\Column(type="float")
     */
    private $turnover;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $business;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mainPicture;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="integer")
     */
    private $oldld;

    /**
     * @ORM\Column(type="float")
     */
    private $faceValue;

    /**
     * @ORM\Column(type="integer")
     */
    private $doubleVotingTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activated;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasQuotation;

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

    public function getLogo(): ?string
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

    public function getTurnover(): ?float
    {
        return $this->turnover;
    }

    public function setTurnover(float $turnover): self
    {
        $this->turnover = $turnover;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(?\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getBusiness(): ?string
    {
        return $this->business;
    }

    public function setBusiness(string $business): self
    {
        $this->business = $business;

        return $this;
    }

    public function getMainPicture(): ?string
    {
        return $this->mainPicture;
    }

    public function setMainPicture(string $mainPicture): self
    {
        $this->mainPicture = $mainPicture;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getModified(): ?\DateTimeInterface
    {
        return $this->modified;
    }

    public function setModified(?\DateTimeInterface $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getOldld(): ?int
    {
        return $this->oldld;
    }

    public function setOldld(int $oldld): self
    {
        $this->oldld = $oldld;

        return $this;
    }

    public function getFaceValue(): ?float
    {
        return $this->faceValue;
    }

    public function setFaceValue(float $faceValue): self
    {
        $this->faceValue = $faceValue;

        return $this;
    }

    public function getDoubleVotingTime(): ?int
    {
        return $this->doubleVotingTime;
    }

    public function setDoubleVotingTime(int $doubleVotingTime): self
    {
        $this->doubleVotingTime = $doubleVotingTime;

        return $this;
    }

    public function getActivated(): ?bool
    {
        return $this->activated;
    }

    public function setActivated(bool $activated): self
    {
        $this->activated = $activated;

        return $this;
    }

    public function getHasQuotation(): ?bool
    {
        return $this->hasQuotation;
    }

    public function setHasQuotation(bool $hasQuotation): self
    {
        $this->hasQuotation = $hasQuotation;

        return $this;
    }
}
