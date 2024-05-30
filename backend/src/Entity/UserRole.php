<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class UserRole
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userRole')]
    #[ORM\JoinColumn(nullable: false)]
    private int $user;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Role::class, inversedBy: 'userRole')]
    #[ORM\JoinColumn(nullable: false)]
    private int $role;

}