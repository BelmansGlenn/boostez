<?php

namespace App\Repository;

use App\Entity\BusinessWorkshop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BusinessWorkshop|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessWorkshop|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessWorkshop[]    findAll()
 * @method BusinessWorkshop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessWorkshopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessWorkshop::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BusinessWorkshop $entity, bool $flush = true): void
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
    public function remove(BusinessWorkshop $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return BusinessWorkshop[] Returns an array of BusinessWorkshop objects
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
    public function findOneBySomeField($value): ?BusinessWorkshop
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
