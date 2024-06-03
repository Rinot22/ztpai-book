<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\DocBlock\Tag;

#[ORM\Entity(repositoryClass: CartRepository::class)]
#[ApiResource]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\OneToOne(targetEntity: CartUser::class, mappedBy: 'cart', cascade: ['persist', 'remove'])]
    private int $cartUser;

    #[ORM\OneToMany(targetEntity: CartBook::class, mappedBy: 'cart', cascade: ['persist', 'remove'])]
    private Collection $cartBook;

    public function __construct()
    {
        $this->cartBook = new ArrayCollection();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->cartUser;
    }

    public function setUserId(int $userId): self
    {
        $this->cartUser = $userId;

        return $this;
    }

    public function getBooks(): Collection
    {
        return $this->cartBook;
    }

    public function setBooks(Collection $books): self
    {
        $this->cartBook = $books;

        return $this;
    }


}