<?php

namespace App\Repository;

use App\Entity\Book;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;

class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findByBookTitle(string $title): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('b')
            ->from('App\Entity\Book', 'b')
            ->where('b.title like :title')
            ->setParameter('title', '%'.$title.'%')
            ->getQuery();

        return $q->getResult();
    }

    public function findById(int $id): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('b')
            ->from('App\Entity\Book', 'b')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $q->getResult();
    }

    public function findAllBooks(): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('b')
            ->from('App\Entity\Book', 'b')
            ->getQuery();

        return $q->getResult();
    }

    public function updateBook(int $id, ?string $title, ?string $description, ?int $price, ?Collection $categories, ?Collection $authors): bool
    {
        $book = $this->getEntityManager()->createQueryBuilder()
            ->select('b')
            ->from('App\Entity\Book', 'b')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        if (!$book) return false;

        $book->setTitle($title)->setDescription($description)->setPrice($price)->setCategories($categories)->setAuthors($authors);
        $this->getEntityManager()->flush();

        return true;
    }

    public function saveBook(string $title, string $description, float $price, DateTimeInterface $publicationDate, Collection $categories): void
    {
        $book = new Book();
        $book->setTitle($title)->setDescription($description)->setPrice($price)->setPublicationDate($publicationDate)->setCategories($categories);

        $this->getEntityManager()->persist($book);
        $this->getEntityManager()->flush();
    }

    public function deleteBookById(int $id): bool
    {
        $book = $this->getEntityManager()->createQueryBuilder()
            ->select('b')
            ->from('App\Entity\Book', 'b')
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        if (!$book) return false;

        $this->getEntityManager()->remove($book);
        $this->getEntityManager()->flush();

        return true;
    }

    public function findBooksByCategoryId(int $categoryId): array
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->select('b')
            ->from('App\Entity\Book', 'b')
            ->where(':categoryId member of b.categories')
            ->setParameter('categoryId', $categoryId)
            ->getQuery();

        return $q->getResult();
    }
}