<?php

namespace App\Repository;

use App\Entity\PrivateRetreat;
use App\Repository\Traits\ConferenceRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateRetreat|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateRetreat|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateRetreat[]    findAll()
 * @method PrivateRetreat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateRetreatRepository extends ServiceEntityRepository
{

    use ConferenceRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateRetreat::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PrivateRetreat $entity, bool $flush = true): void
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
    public function remove(PrivateRetreat $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

}
