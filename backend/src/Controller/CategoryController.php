<?php

namespace App\Controller;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    public function __construct(private CategoryService $cs)
    {
    }

    #[Route(path: '/api/categories', methods: ['GET'])]
    public function books(): Response
    {
        $response = new JsonResponse($this->cs->getAllCategories());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}