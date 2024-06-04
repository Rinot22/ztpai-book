<?php

namespace App\Repository;

use App\Entity\Cart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

class CartRepository extends ServiceEntityRepository implements ObjectRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    public function findCartByUserId(int $user): Cart
    {
        $q = $this->getEntityManager()->createQueryBuilder('c')
            ->innerJoin('c.c.cartUser', 'cu')
            ->innerJoin('cu.user', 'u')
            ->andWhere('u.id = :id')
            ->setParameter('id', $user)
            ->getQuery();

        return $q->getResult();
    }
}