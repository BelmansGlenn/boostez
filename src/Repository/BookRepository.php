<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Book $entity, bool $flush = true): void
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
    public function remove(Book $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findAllBooksByLocaleOrderByImportance($locale)
    {
        return $this->createQueryBuilder('b')
            ->select('b.image', 'b.title', 'b.description')
            ->andWhere('b.language = :locale')
            ->setParameter('locale', $locale)
            ->andWhere('b.isVisible = true')
            ->orderBy('b.inOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllBooksWhereLocaleIsNotEqualOrderByImportance($locale)
    {
        return $this->createQueryBuilder('b')
            ->select('b.image', 'b.title', 'b.language')
            ->andWhere('b.language <> :locale')
            ->setParameter('locale', $locale)
            ->andWhere('b.isVisible = true')
            ->orderBy('b.inOrder', 'ASC')
            ->addOrderBy('b.language', 'DESC')
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Book[] Returns an array of Book objects
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
    public function findOneBySomeField($value): ?Book
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
