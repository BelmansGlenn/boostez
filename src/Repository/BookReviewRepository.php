<?php

namespace App\Repository;

use App\Entity\BookReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookReview[]    findAll()
 * @method BookReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookReview::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BookReview $entity, bool $flush = true): void
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
    public function remove(BookReview $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findTwoBookReviewByLocale($locale)
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b.firstname', 'b.lastname');
        if ($locale === 'FR')
        {
            $qb->addSelect('b.reviewFR');

        }elseif ($locale === 'NL')
        {
            $qb->addSelect('b.reviewNL');

        }elseif ($locale === 'EN')
        {
            $qb->addSelect('b.reviewEN');

        }
        return $qb
            ->orderBy('b.inOrder', 'ASC')
            ->setMaxResults(2)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return BookReview[] Returns an array of BookReview objects
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
    public function findOneBySomeField($value): ?BookReview
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
