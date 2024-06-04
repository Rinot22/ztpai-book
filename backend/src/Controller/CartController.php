<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{


    public function __construct(private CartService $cs)
    {
    }

    #[Route(path: "/api/cart", methods: ['GET'])]
    public function getCart(): Response
    {
        $response = new JsonResponse($this->cs->getCart($this->getUser()->getId()));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}