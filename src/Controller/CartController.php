<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route(path: "/cart/{id}", methods: ['GET'])]
    public function getCart(int $userId, int $id): Response
    {
        return $this->json('it\'s a cart of user with id:'.$userId.' by id: '.$id);
    }

    #[Route(path: '/cart/{id}')]
    public function clearCart(int $id): Response
    {
        return $this->json('Delete cart with id: '.$id);
    }
}