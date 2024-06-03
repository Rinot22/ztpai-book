<?php

namespace App\Repository;

use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

class CategoryRepository extends ServiceEntityRepository implements ObjectRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findAllCategories(): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('c')
            ->from('App\Entity\Category', 'c')
            ->getQuery();

        return $q->getResult();
    }
}