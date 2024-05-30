<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewsController extends AbstractController
{
    #[Route(path: 'news/{id}', methods: ['GET'])]
    public function getNews(int $id): Response
    {
        return $this->json('news by id: '.$id);
    }

    #[Route(path: '/news', methods: ['GET'])]
    public function getAllNews(): Response
    {
        return $this->json('all news');
    }

    #[Route(path: '/news', methods: ['POST'])]
    public function addNews(): Response
    {
        return $this->json('');
    }

    #[Route(path: '/news', methods: ['DELETE'])]
    public function deleteNews(int $id): Response
    {
        return $this->json('');
    }
}