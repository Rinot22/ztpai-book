<?php

namespace App\Controller;

use App\Service\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewsController extends AbstractController
{
    public function __construct(private NewsService $ns)
    {
    }

    #[Route(path: '/api/news/{id}', methods: ['GET'])]
    public function getNews(int $id): Response
    {
        $response = new JsonResponse($this->ns->getNews($id));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    #[Route(path: '/api/news', methods: ['GET'])]
    public function getAllNews(): Response
    {
        $response = new JsonResponse($this->ns->getAllNews());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    #[Route(path: '/api/news', methods: ['POST'])]
    public function addNews(): Response
    {
        return $this->json('');
    }

    #[Route(path: '/api/news/{id}', methods: ['DELETE'])]
    public function deleteNews(int $id): Response
    {
        return $this->json('');
    }
}