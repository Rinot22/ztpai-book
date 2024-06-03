<?php

namespace App\Controller;

use App\Service\AuthorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{


    public function __construct(private AuthorService $as)
    {
    }

    #[Route(path: '/api/books', methods: ['GET'])]
    public function books(): Response
    {
        $response = new JsonResponse($this->as->getAuthors());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}