<?php

namespace App\Service;

use App\Entity\Cart;
use App\Repository\CartRepository;

class CartService
{

    public function __construct(private CartRepository $cr)
    {
    }

    public function getCart(int $id): Cart
    {
        return $this->cr->findCartByUserId($id);
    }
}