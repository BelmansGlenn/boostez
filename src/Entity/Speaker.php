<?php

namespace App\Entity;

use App\Repository\SpeakerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SpeakerRepository::class)]
class Speaker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $statusFR;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $statusNL;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $statusEN;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $image;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private $DescriptionFR;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private $DescriptionNL;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private $DescriptionEN;

    #[ORM\Column(type: 'array')]
    #[Assert\NotBlank]
    private $language;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private $inOrder;

    #[ORM\Column(type: 'boolean')]
    private $isVisible = true;

    #[ORM\ManyToMany(targetEntity: BusinessConference::class, inversedBy: 'speakers')]
    private $businessConferences;

    #[ORM\ManyToMany(targetEntity: BusinessWorkshop::class, inversedBy: 'speakers')]
    private $businessWorkshops;

    #[ORM\ManyToMany(targetEntity: PrivateRetreat::class, inversedBy: 'speakers')]
    private $privateRetreats;

    #[ORM\ManyToMany(targetEntity: PrivateWorkshop::class, inversedBy: 'speakers')]
    private $privateWorkshops;

    #[ORM\ManyToMany(targetEntity: PrivateCoaching::class, inversedBy: 'speakers')]
    private $privateCoachings;

    public function __construct()
    {
        $this->businessConferences = new ArrayCollection();
        $this->businessWorkshops = new ArrayCollection();
        $this->privateRetreats = new ArrayCollection();
        $this->privateWorkshops = new ArrayCollection();
        $this->privateCoachings = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getStatusFR()
    {
        return $this->statusFR;
    }

    /**
     * @param mixed $statusFR
     */
    public function setStatusFR($statusFR): void
    {
        $this->statusFR = $statusFR;
    }

    /**
     * @return mixed
     */
    public function getStatusNL()
    {
        return $this->statusNL;
    }

    /**
     * @param mixed $statusNL
     */
    public function setStatusNL($statusNL): void
    {
        $this->statusNL = $statusNL;
    }

    /**
     * @return mixed
     */
    public function getStatusEN()
    {
        return $this->statusEN;
    }

    /**
     * @param mixed $statusEN
     */
    public function setStatusEN($statusEN): void
    {
        $this->statusEN = $statusEN;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescriptionFR()
    {
        return $this->DescriptionFR;
    }

    /**
     * @param mixed $DescriptionFR
     */
    public function setDescriptionFR($DescriptionFR): void
    {
        $this->DescriptionFR = $DescriptionFR;
    }

    /**
     * @return mixed
     */
    public function getDescriptionNL()
    {
        return $this->DescriptionNL;
    }

    /**
     * @param mixed $DescriptionNL
     */
    public function setDescriptionNL($DescriptionNL): void
    {
        $this->DescriptionNL = $DescriptionNL;
    }

    /**
     * @return mixed
     */
    public function getDescriptionEN()
    {
        return $this->DescriptionEN;
    }

    /**
     * @param mixed $DescriptionEN
     */
    public function setDescriptionEN($DescriptionEN): void
    {
        $this->DescriptionEN = $DescriptionEN;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getInOrder()
    {
        return $this->inOrder;
    }

    /**
     * @param mixed $inOrder
     */
    public function setInOrder($inOrder): void
    {
        $this->inOrder = $inOrder;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->isVisible;
    }

    /**
     * @param bool $isVisible
     */
    public function setIsVisible(bool $isVisible): void
    {
        $this->isVisible = $isVisible;
    }



    /**
     * @return Collection<int, BusinessConference>
     */
    public function getBusinessConferences(): Collection
    {
        return $this->businessConferences;
    }

    public function addBusinessConference(BusinessConference $businessConference): self
    {
        if (!$this->businessConferences->contains($businessConference)) {
            $this->businessConferences[] = $businessConference;
        }

        return $this;
    }

    public function removeBusinessConference(BusinessConference $businessConference): self
    {
        $this->businessConferences->removeElement($businessConference);

        return $this;
    }

    /**
     * @return Collection<int, BusinessWorkshop>
     */
    public function getBusinessWorkshops(): Collection
    {
        return $this->businessWorkshops;
    }

    public function addBusinessWorkshop(BusinessWorkshop $businessWorkshop): self
    {
        if (!$this->businessWorkshops->contains($businessWorkshop)) {
            $this->businessWorkshops[] = $businessWorkshop;
        }

        return $this;
    }

    public function removeBusinessWorkshop(BusinessWorkshop $businessWorkshop): self
    {
        $this->businessWorkshops->removeElement($businessWorkshop);

        return $this;
    }

    /**
     * @return Collection<int, PrivateRetreat>
     */
    public function getPrivateRetreats(): Collection
    {
        return $this->privateRetreats;
    }

    public function addPrivateRetreat(PrivateRetreat $privateRetreat): self
    {
        if (!$this->privateRetreats->contains($privateRetreat)) {
            $this->privateRetreats[] = $privateRetreat;
        }

        return $this;
    }

    public function removePrivateRetreat(PrivateRetreat $privateRetreat): self
    {
        $this->privateRetreats->removeElement($privateRetreat);

        return $this;
    }

    /**
     * @return Collection<int, PrivateWorkshop>
     */
    public function getPrivateWorkshops(): Collection
    {
        return $this->privateWorkshops;
    }

    public function addPrivateWorkshop(PrivateWorkshop $privateWorkshop): self
    {
        if (!$this->privateWorkshops->contains($privateWorkshop)) {
            $this->privateWorkshops[] = $privateWorkshop;
        }

        return $this;
    }

    public function removePrivateWorkshop(PrivateWorkshop $privateWorkshop): self
    {
        $this->privateWorkshops->removeElement($privateWorkshop);

        return $this;
    }

    /**
     * @return Collection<int, PrivateCoaching>
     */
    public function getPrivateCoachings(): Collection
    {
        return $this->privateCoachings;
    }

    public function addPrivateCoaching(PrivateCoaching $privateCoaching): self
    {
        if (!$this->privateCoachings->contains($privateCoaching)) {
            $this->privateCoachings[] = $privateCoaching;
            $privateCoaching->addSpeaker($this);
        }

        return $this;
    }

    public function removePrivateCoaching(PrivateCoaching $privateCoaching): self
    {
        if ($this->privateCoachings->removeElement($privateCoaching)) {
            $privateCoaching->removeSpeaker($this);
        }

        return $this;
    }
}
