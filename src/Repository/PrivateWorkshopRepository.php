<?php

namespace App\Repository;

use App\Entity\PrivateWorkshop;
use App\Repository\Traits\ConferenceRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateWorkshop|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateWorkshop|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateWorkshop[]    findAll()
 * @method PrivateWorkshop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateWorkshopRepository extends ServiceEntityRepository
{

    use ConferenceRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateWorkshop::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PrivateWorkshop $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PrivateWorkshop $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

}
