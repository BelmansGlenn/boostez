<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


trait ReviewTrait
{

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
    #[Assert\Length(min: 3, max: 255)]
    private string $reviewFR;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private string $reviewNL;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private string $reviewEN;

    #[ORM\Column(type: 'integer')]
    private int $inOrder;

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
     * @return string
     */
    public function getReviewFR(): string
    {
        return $this->reviewFR;
    }

    /**
     * @param string $reviewFR
     */
    public function setReviewFR(string $reviewFR): void
    {
        $this->reviewFR = $reviewFR;
    }

    /**
     * @return string
     */
    public function getReviewNL(): string
    {
        return $this->reviewNL;
    }

    /**
     * @param string $reviewNL
     */
    public function setReviewNL(string $reviewNL): void
    {
        $this->reviewNL = $reviewNL;
    }

    /**
     * @return string
     */
    public function getReviewEN(): string
    {
        return $this->reviewEN;
    }

    /**
     * @param string $reviewEN
     */
    public function setReviewEN(string $reviewEN): void
    {
        $this->reviewEN = $reviewEN;
    }

    /**
     * @return int
     */
    public function getInOrder(): int
    {
        return $this->inOrder;
    }

    /**
     * @param int $inOrder
     */
    public function setInOrder(int $inOrder): void
    {
        $this->inOrder = $inOrder;
    }


}