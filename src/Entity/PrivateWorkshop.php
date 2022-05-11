<?php

namespace App\Entity;

use App\Entity\Traits\ConferenceTrait;
use App\Repository\PrivateWorkshopRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrivateWorkshopRepository::class)]
class PrivateWorkshop
{

    use ConferenceTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
