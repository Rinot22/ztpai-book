<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CartBook
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Cart::class, inversedBy: 'cartBook')]
    #[ORM\JoinColumn(nullable: false)]
    private Cart $cart;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: 'cartBook')]
    #[ORM\JoinColumn(nullable: false)]
    private Book $book;

}