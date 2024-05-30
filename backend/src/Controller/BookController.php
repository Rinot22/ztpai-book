<?php

namespace App\Controller;

use App\Service\BookService;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{


    public function __construct(private BookService $bs)
    {
    }

    #[Route(path: '/api/books/{id}')]
    public function bookById(int $id): Response
    {
        $response = new JsonResponse($this->bs->getBookById($id));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    #[Route(path: '/api/books', methods: ['GET'])]
    public function books(): Response
    {
        $response = new JsonResponse($this->bs->getAllBooks());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    #[Route(path: '/api/books', methods: ['POST'])]
    public function add(): Response
    {
        return $this->json('add book');
    }

    #[Route(path: '/api/books/{id}', methods: ['DELETE'])]
    public function delete(int $id): Response
    {
        return $this->json('delete book: '.$id);
    }

    #[Route(path: '/api/books/{id}', methods: ['PATCH'])]
    public function patch(int $id): Response
    {
        return $this->json('update book: '.$id);
    }

}