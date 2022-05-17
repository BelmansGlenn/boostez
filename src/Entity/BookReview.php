<?php

namespace App\Entity;

use App\Entity\Traits\ReviewTrait;
use App\Repository\BookReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Count;

#[ORM\Entity(repositoryClass: BookReviewRepository::class)]
class BookReview
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
