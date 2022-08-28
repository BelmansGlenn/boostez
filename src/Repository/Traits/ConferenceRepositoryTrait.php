<?php

namespace App\Repository\Traits;

trait ConferenceRepositoryTrait
{

    public function findAllConfNameByLocale($locale)
    {
        return $this
            ->createQueryBuilder('c')
            ->select('c.name', 'c.slug')
            ->andWhere('c.language = :locale')
            ->setParameter('locale', $locale)
            ->andWhere('c.isVisible = true')
            ->orderBy('c.inOrder', 'ASC')
            ->getQuery()->getResult();
    }

    public function findOneConfBySlugAndByLocale($slug, $locale)
    {
        return $this
            ->createQueryBuilder('c')
            ->select('c.name', 'c.video', 'c.point',
            'c.language')
            ->andWhere('c.slug = :slug')
            ->setParameter('slug', $slug)
            ->andWhere('c.language = :locale')
            ->setParameter('locale', $locale)
            ->andWhere('c.isVisible = true')
            ->orderBy('c.inOrder', 'ASC')
            ->getQuery()->getOneOrNullResult();
    }

    public function findNameAndSlugByLocaleFromConfBySpeakerId($id, $locale)
    {
            return $this->createQueryBuilder('c')
                ->select('c.name', 'c.slug')
                ->leftJoin('c.speakers', 'speakers')
//                ->addSelect('CASE WHEN c.language = :locale THEN 1 ELSE 0 END AS HIDDEN sortCondition')
                ->andWhere('c.language = :locale')
                ->andWhere('speakers.id = :val')
                ->setParameter('val', $id)
                ->setParameter('locale', $locale)
//                ->orderBy('sortCondition', 'DESC')
                ->addOrderBy('c.inOrder', 'ASC')
                ->getQuery()
                ->getResult();
    }


}