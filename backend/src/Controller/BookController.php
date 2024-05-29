<?php

namespace App\Controller;

use App\Service\BookService;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{


    public function __construct(private BookService $bs)
    {
    }

    #[Route(path: '/books/$title', methods: ['GET'])]
    public function bookByTitle(string $title): Response
    {
            return $this->json($this->bs->getBookByTitle($title));
    }

    #[Route(path: '/category/{id}/books', methods: ['GET'])]
    public function booksByCategoryId(int $id): Response
    {
        return $this->json($this->bs->getBooksByCategory($id));
    }

    #[Route(path: '/books/{id}')]
    public function bookById(int $id): Response
    {
        return $this->json($this->bs->getBookById($id));
    }

    #[Route(path: '/books', methods: ['GET'])]
    public function books(): Response
    {
        return $this->json($this->bs->getAllBooks());
    }

    #[Route(path: '/books', methods: ['POST'])]
    public function add(): Response
    {
        return $this->json('add book');
    }

    #[Route(path: '/books/{id}', methods: ['DELETE'])]
    public function delete(int $id): Response
    {
        return $this->json('delete book: '.$id);
    }

    #[Route(path: '/books/{id}', methods: ['PATCH'])]
    public function patch(int $id): Response
    {
        return $this->json('update book: '.$id);
    }

}