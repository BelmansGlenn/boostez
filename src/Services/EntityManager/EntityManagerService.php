<?php

namespace App\Services\EntityManager;

use Doctrine\ORM\EntityManagerInterface;

class EntityManagerService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function create($object)
    {
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }
    

}