<?php

namespace App\Entity;

use App\Entity\Traits\ReviewTrait;
use App\Repository\ConferenceReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConferenceReviewRepository::class)]
class ConferenceReview
{

    use ReviewTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
