<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ApiResource]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 50)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 50)]
    private string $secondName = '';

    #[ORM\Column(type: 'string', length: 50)]
    private string $surname;

    #[ORM\ManyToMany(targetEntity: BookAuthor::class, mappedBy: 'author', cascade: ['persist', 'remove'])]
    private Collection $bookAuthor;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

}