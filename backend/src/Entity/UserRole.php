<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class UserRole
{
    private int $userId;
    private int $roleId;

}