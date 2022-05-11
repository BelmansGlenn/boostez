<?php

namespace App\Entity;

use App\Entity\Traits\ConferenceTrait;
use App\Repository\BusinessWorkshopRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusinessWorkshopRepository::class)]
class BusinessWorkshop
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
