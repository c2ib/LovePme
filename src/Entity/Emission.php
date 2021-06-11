<?php

namespace App\Entity;

use App\Repository\EmissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmissionRepository::class)
 */
class Emission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $validDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $emittedQuantity;

    /**
     * @ORM\Column(type="float")
     */
    private $issueValue;

    /**
     * @ORM\ManyToOne(targetEntity=Title::class, inversedBy="emissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $published;

    /**
     * @ORM\Column(type="integer")
     */
    private $acquiredQuantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $convertedQuantity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRedemption;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmittedQuantity(): ?int
    {
        return $this->emittedQuantity;
    }

    public function setEmittedQuantity(int $emittedQuantity): self
    {
        $this->emittedQuantity = $emittedQuantity;

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

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    public function setTitle(?Title $title): self
    {
        $this->title = $title;

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

    public function getPublished(): ?\DateTimeInterface
    {
        return $this->published;
    }

    public function setPublished(?\DateTimeInterface $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getAcquiredQuantity(): ?int
    {
        return $this->acquiredQuantity;
    }

    public function setAcquiredQuantity(int $acquiredQuantity): self
    {
        $this->acquiredQuantity = $acquiredQuantity;

        return $this;
    }

    public function getConvertedQuantity(): ?int
    {
        return $this->convertedQuantity;
    }

    public function setConvertedQuantity(int $convertedQuantity): self
    {
        $this->convertedQuantity = $convertedQuantity;

        return $this;
    }

    public function getIsRedemption(): ?bool
    {
        return $this->isRedemption;
    }

    public function setIsRedemption(bool $isRedemption): self
    {
        $this->isRedemption = $isRedemption;

        return $this;
    }
}
