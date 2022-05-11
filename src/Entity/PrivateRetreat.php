<?php

namespace App\Entity;

use App\Entity\Traits\ConferenceTrait;
use App\Repository\PrivateRetreatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrivateRetreatRepository::class)]
class PrivateRetreat
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
