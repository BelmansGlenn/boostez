<?php

namespace App\Entity;

use App\Repository\LogoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: LogoRepository::class)]
class Logo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private $image;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private $inOrder;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getInOrder(): ?int
    {
        return $this->inOrder;
    }

    public function setInOrder(int $inOrder): self
    {
        $this->inOrder = $inOrder;

        return $this;
    }
}
