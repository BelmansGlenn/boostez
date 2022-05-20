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

    public function __construct()
    {
        $this->businessConferences = new ArrayCollection();
        $this->businessWorkshops = new ArrayCollection();
        $this->privateRetreats = new ArrayCollection();
        $this->privateWorkshops = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescriptionFR(): ?string
    {
        return $this->DescriptionFR;
    }

    public function setDescriptionFR(string $DescriptionFR): self
    {
        $this->DescriptionFR = $DescriptionFR;

        return $this;
    }

    public function getDescriptionNL(): ?string
    {
        return $this->DescriptionNL;
    }

    public function setDescriptionNL(string $DescriptionNL): self
    {
        $this->DescriptionNL = $DescriptionNL;

        return $this;
    }

    public function getDescriptionEN(): ?string
    {
        return $this->DescriptionEN;
    }

    public function setDescriptionEN(string $DescriptionEN): self
    {
        $this->DescriptionEN = $DescriptionEN;

        return $this;
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



    public function getInOrder(): ?int
    {
        return $this->inOrder;
    }

    public function setInOrder(int $inOrder): self
    {
        $this->inOrder = $inOrder;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
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

}
