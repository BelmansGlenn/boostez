<?php

namespace App\Repository;

use App\Entity\BusinessConference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BusinessConference|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessConference|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessConference[]    findAll()
 * @method BusinessConference[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessConferenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessConference::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BusinessConference $entity, bool $flush = true): void
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
    public function remove(BusinessConference $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return BusinessConference[] Returns an array of BusinessConference objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BusinessConference
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
