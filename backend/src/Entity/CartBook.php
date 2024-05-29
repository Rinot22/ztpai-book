<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CartBook
{
    #[ORM\ManyToOne(targetEntity: Cart::class, inversedBy: 'cartBook')]
    #[ORM\JoinColumn(nullable: false)]
    private int $cartId;

    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: 'cartBook')]
    #[ORM\JoinColumn(nullable: false)]
    private int $bookId;

}