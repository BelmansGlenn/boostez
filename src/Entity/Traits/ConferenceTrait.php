<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait ConferenceTrait
{
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max:50)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $slug;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max:50)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $targetedAudience;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $video;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $point1;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $point2;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $point3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $point4;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $point5;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $point6;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $point7;

    #[ORM\Column(type: 'string', length: 2)]
    #[Assert\NotBlank]
    private string $language;

    #[ORM\Column(type: 'integer')]
    private int $inOrder;

    #[ORM\Column(type: 'boolean')]
    private bool $isVisible = true;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTargetedAudience(): string
    {
        return $this->targetedAudience;
    }

    /**
     * @param string $targetedAudience
     */
    public function setTargetedAudience(string $targetedAudience): void
    {
        $this->targetedAudience = $targetedAudience;
    }

    /**
     * @return string
     */
    public function getVideo(): string
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo(string $video): void
    {
        $this->video = $video;
    }

    /**
     * @return string
     */
    public function getPoint1(): string
    {
        return $this->point1;
    }

    /**
     * @param string $point1
     */
    public function setPoint1(string $point1): void
    {
        $this->point1 = $point1;
    }

    /**
     * @return string
     */
    public function getPoint2(): string
    {
        return $this->point2;
    }

    /**
     * @param string $point2
     */
    public function setPoint2(string $point2): void
    {
        $this->point2 = $point2;
    }

    /**
     * @return string
     */
    public function getPoint3(): string
    {
        return $this->point3;
    }

    /**
     * @param string $point3
     */
    public function setPoint3(string $point3): void
    {
        $this->point3 = $point3;
    }

    /**
     * @return string
     */
    public function getPoint4(): string
    {
        return $this->point4;
    }

    /**
     * @param string $point4
     */
    public function setPoint4(string $point4): void
    {
        $this->point4 = $point4;
    }

    /**
     * @return string
     */
    public function getPoint5(): string
    {
        return $this->point5;
    }

    /**
     * @param string $point5
     */
    public function setPoint5(string $point5): void
    {
        $this->point5 = $point5;
    }

    /**
     * @return string
     */
    public function getPoint6(): string
    {
        return $this->point6;
    }

    /**
     * @param string $point6
     */
    public function setPoint6(string $point6): void
    {
        $this->point6 = $point6;
    }

    /**
     * @return string
     */
    public function getPoint7(): string
    {
        return $this->point7;
    }

    /**
     * @param string $point7
     */
    public function setPoint7(string $point7): void
    {
        $this->point7 = $point7;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
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


}