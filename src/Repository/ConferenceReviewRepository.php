<?php

namespace App\Repository;

use App\Entity\ConferenceReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConferenceReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConferenceReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConferenceReview[]    findAll()
 * @method ConferenceReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConferenceReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConferenceReview::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConferenceReview $entity, bool $flush = true): void
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
    public function remove(ConferenceReview $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ConferenceReview[] Returns an array of ConferenceReview objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConferenceReview
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findTwoConfReviewByLocale($locale)
    {
        return $this->createQueryBuilder('c')
            ->select('c.firstname', 'c.lastname', 'c.company', 'c.review')
            ->andWhere('c.language = :locale')
            ->setParameter('locale', $locale)
            ->orderBy('c.inOrder', 'ASC')
            ->setMaxResults(2)
            ->getQuery()
            ->getResult();
    }
}
