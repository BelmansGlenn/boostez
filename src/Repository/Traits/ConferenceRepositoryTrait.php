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
}