<?php

namespace App\Repository;

use App\Entity\BusinessConference;
use App\Repository\Traits\ConferenceRepositoryTrait;
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
    use ConferenceRepositoryTrait;



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




}
