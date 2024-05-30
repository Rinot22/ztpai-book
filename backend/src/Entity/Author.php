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
    public string $firstName;

    #[ORM\Column(type: 'string', length: 50)]
    private string $secondName = '';

    #[ORM\Column(type: 'string', length: 50)]
    private string $surname;

    #[ORM\OneToMany(targetEntity: BookAuthor::class, mappedBy: 'author', cascade: ['persist', 'remove'])]
    private Collection $bookAuthor;

    public function __construct()
    {
        $this->booksAuthor = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return sprintf('%s %s', $this->firstName, $this->secondName);
    }
}