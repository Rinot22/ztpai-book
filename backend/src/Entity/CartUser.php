<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CartUser
{
    #[ORM\Id]
    #[ORM\OneToOne(targetEntity: Cart::class, inversedBy: 'cartUser')]
    #[ORM\JoinColumn(nullable: false)]
    private int $cart;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'cartUser')]
    #[ORM\JoinColumn(nullable: false)]
    private int $user;

}