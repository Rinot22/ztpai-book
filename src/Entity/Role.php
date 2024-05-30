<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $role;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'role')]
    #[ORM\JoinTable(name: 'role_user')]
    private Collection $users;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }


}