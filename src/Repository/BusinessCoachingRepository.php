<?php

namespace App\Repository;

use App\Entity\BusinessCoaching;
use App\Repository\Traits\ConferenceRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BusinessCoaching>
 *
 * @method BusinessCoaching|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessCoaching|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessCoaching[]    findAll()
 * @method BusinessCoaching[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessCoachingRepository extends ServiceEntityRepository
{
    use ConferenceRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessCoaching::class);
    }

    public function add(BusinessCoaching $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BusinessCoaching $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BusinessCoaching[] Returns an array of BusinessCoaching objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BusinessCoaching
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
