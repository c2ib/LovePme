<?php

namespace App\Entity;

use App\Repository\TitleRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $validDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $voteModificationTime;

    /**
     * @ORM\Column(type="float")
     */
    private $powerQuantity;

    /**
     * @ORM\Column(type="float")
     */
    private $voteDefaultQuantity;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(type="integer")
     */
    private $emissionRelated;

    /**
     * @ORM\Column(type="float")
     */
    private $issueValue;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activated;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $isin;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $paymentDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $convertible;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getValidDate(): ?\DateTimeInterface
    {
        return $this->validDate;
    }

    public function setValidDate(?\DateTimeInterface $validDate): self
    {
        $this->validDate = $validDate;

        return $this;
    }

    public function getVoteModificationTime(): ?int
    {
        return $this->voteModificationTime;
    }

    public function setVoteModificationTime(int $voteModificationTime): self
    {
        $this->voteModificationTime = $voteModificationTime;

        return $this;
    }

    public function getPowerQuantity(): ?float
    {
        return $this->powerQuantity;
    }

    public function setPowerQuantity(float $powerQuantity): self
    {
        $this->powerQuantity = $powerQuantity;

        return $this;
    }

    public function getVoteDefaultQuantity(): ?float
    {
        return $this->voteDefaultQuantity;
    }

    public function setVoteDefaultQuantity(float $voteDefaultQuantity): self
    {
        $this->voteDefaultQuantity = $voteDefaultQuantity;

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

    public function getModified(): ?\DateTimeInterface
    {
        return $this->modified;
    }

    public function setModified(?\DateTimeInterface $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    public function getEmissionRelated(): ?int
    {
        return $this->emissionRelated;
    }

    public function setEmissionRelated(int $emissionRelated): self
    {
        $this->emissionRelated = $emissionRelated;

        return $this;
    }

    public function getIssueValue(): ?float
    {
        return $this->issueValue;
    }

    public function setIssueValue(float $issueValue): self
    {
        $this->issueValue = $issueValue;

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

    public function getIsin(): ?string
    {
        return $this->isin;
    }

    public function setIsin(string $isin): self
    {
        $this->isin = $isin;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(?\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getConvertible(): ?bool
    {
        return $this->convertible;
    }

    public function setConvertible(bool $convertible): self
    {
        $this->convertible = $convertible;

        return $this;
    }
}
