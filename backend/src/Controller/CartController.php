<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route(path: "/api/carts", methods: ['POST'])]
    public function createCart(): Response
    {
        return new JsonResponse();
    }

    #[Route(path: "/api/carts/{id}", methods: ['GET'])]
    public function getCart(int $userId, int $id): Response
    {
        return $this->json('it\'s a cart of user with id:'.$userId.' by id: '.$id);
    }
}