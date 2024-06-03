<?php

namespace App\Repository;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

class AuthorRepository extends ServiceEntityRepository implements ObjectRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    public function findAllAuthors(): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('a')
            ->from('App\Entity\Author', 'a')
            ->getQuery();

        return $q->getResult();
    }

    public function findById(int $id): Author
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('a')
            ->from('App\Entity\Author', 'a')
            ->innerJoin('BookAuthor', 'ba')
            ->where('a.id = ba.author_id')
            ->innerJoin('Book', 'b')
            ->where('b.id = ba.book_id')
            ->where('a.id = :id')
            ->setParameter('id', '$id')
            ->getQuery();

        return $q->getResult();
    }
}