<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

class NewsRepository extends ServiceEntityRepository implements ObjectRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    public function findAllNews(): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('n')
            ->from('App\Entity\News', 'n')
            ->getQuery();

        return $q->getResult();
    }
}