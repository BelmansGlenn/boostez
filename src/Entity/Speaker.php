<?php

namespace App\Entity;

use App\Repository\SpeakerRepository;
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
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
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
    private $ConferenceFR;

    #[ORM\Column(type: 'array')]
    #[Assert\NotBlank]
    private $ConferenceNL;

    #[ORM\Column(type: 'array')]
    #[Assert\NotBlank]
    private $ConferenceEN;

    #[ORM\Column(type: 'array')]
    #[Assert\NotBlank]
    private $language;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private $inOrder;

    #[ORM\Column(type: 'boolean')]
    private $isVisible = true;

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
    public function getConferenceFR()
    {
        return $this->ConferenceFR;
    }

    /**
     * @param mixed $ConferenceFR
     */
    public function setConferenceFR($ConferenceFR): void
    {
        $this->ConferenceFR = $ConferenceFR;
    }

    /**
     * @return mixed
     */
    public function getConferenceNL()
    {
        return $this->ConferenceNL;
    }

    /**
     * @param mixed $ConferenceNL
     */
    public function setConferenceNL($ConferenceNL): void
    {
        $this->ConferenceNL = $ConferenceNL;
    }

    /**
     * @return mixed
     */
    public function getConferenceEN()
    {
        return $this->ConferenceEN;
    }

    /**
     * @param mixed $ConferenceEN
     */
    public function setConferenceEN($ConferenceEN): void
    {
        $this->ConferenceEN = $ConferenceEN;
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
}
