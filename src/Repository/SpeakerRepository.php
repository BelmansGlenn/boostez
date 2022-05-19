<?php

namespace App\Repository;

use App\Entity\Speaker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Speaker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Speaker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Speaker[]    findAll()
 * @method Speaker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpeakerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Speaker::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Speaker $entity, bool $flush = true): void
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
    public function remove(Speaker $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findAllSpeakersGetDescriptionByLocaleOrderByImportance($locale)
    {
        $qb = $this->createQueryBuilder('s')
            ->select('s.image', 's.firstname', 's.lastname', 's.language', 's.ConferenceFR', 's.ConferenceNL', 's.ConferenceEN')
            ->andWhere('s.isVisible = true');
        if ($locale === 'FR')
        {
            $qb->addSelect('s.DescriptionFR');

        }elseif ($locale === 'NL')
        {
            $qb->addSelect('s.DescriptionNL');

        }elseif ($locale === 'EN')
        {
            $qb->addSelect('s.DescriptionEN');

        }
           return $qb
            ->orderBy('s.inOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Speaker[] Returns an array of Speaker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Speaker
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
