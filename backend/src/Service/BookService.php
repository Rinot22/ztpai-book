<?php

namespace App\Service;

use App\Entity\Book;
use App\Repository\BookRepository;

class BookService
{
    public function __construct(private BookRepository $bookRepo)
    {}

    public function getBookByTitle(string $title): Book
    {
        return $this->bookRepo->findByBookTitle($title);
    }

    public function getBooksByCategory(int $categoryId): array
    {
        return $this->bookRepo->findBooksByCategoryId($categoryId);
    }

    public function getAllBooks(): array
    {
        return $this->bookRepo->findAllBooks();
    }

    public function getBookById(int $id): Book
    {
        return $this->bookRepo->find($id);
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
}