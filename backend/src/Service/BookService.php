<?php

namespace App\Service;

use App\Entity\Book;
use App\Model\BookListItem;
use App\Model\BookListResponse;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;

class BookService
{
    public function __construct(private BookRepository $bookRepo, private CategoryRepository $categoryRepo)
    {}

    public function getBookByTitle(string $title): BookListResponse
    {
        $book = $this->bookRepo->find($title);

        return new BookListResponse(array_map(
            [$this, 'map'],
            $this->bookRepo->findByBookTitle($title)
        ));
    }

    public function getBooksByCategory(int $categoryId): BookListResponse
    {
        return new BookListResponse(array_map(
            [$this, 'map'],
            $this->bookRepo->findBooksByCategoryId($categoryId)
        ));
    }

    public function getAllBooks(): BookListResponse
    {
        return new BookListResponse(array_map(
           [$this, 'map'],
           $this->bookRepo->findAllBooks()
        ));
    }

    public function getBookById(int $id): BookListResponse
    {
        return new BookListResponse(array_map(
           [$this, 'map'],
           $this->bookRepo->findById($id)
        ));
    }

    public function addBook(): void
    {
        $this->bookRepo->saveBook();
    }

    public function removeBook()
    {

    }

    public function updateBook()
    {

    }

    private function map(Book $book): BookListItem
    {
        return (new BookListItem())
            ->setId($book->getId())
            ->setTitle($book->getTitle())
            ->setPrice($book->getPrice())
            ->setDescription($book->getDescription())
            ->setAuthors($book->getAuthors())
            ->setPublicationDate($book->getPublicationDate()->getTimestamp());
    }
}