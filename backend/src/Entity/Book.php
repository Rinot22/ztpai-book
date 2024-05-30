<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ORM\Table(name: 'book')]
#[ApiResource]
class Book implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $description;

    #[ORM\Column(type: 'float')]
    private float $price;

    #[ORM\Column(type: 'date')]
    private DateTimeInterface $publicationDate;

    #[ORM\OneToMany(targetEntity: BookAuthor::class, mappedBy: 'book', cascade: ['persist', 'remove'])]
    public Collection $bookAuthors;

    #[ORM\OneToMany(targetEntity: BookCategory::class, mappedBy: 'book', cascade: ['persist', 'remove'])]
    private Collection $categories;

    #[ORM\OneToMany(targetEntity: CartBook::class, mappedBy: 'book', cascade: ['persist', 'remove'])]
    private Collection $carts;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->bookAuthors = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPublicationDate(): DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function setCategories(Collection $categories): self
    {
        $this->categories = $categories;
        return $this;
    }

    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function getAuthors(): Collection
    {
        return $this->bookAuthors;
    }

    public function setAuthors(Collection $authors): self
    {
        $this->bookAuthors = $authors;

        return $this;
    }


    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'categories' => array_map(
                static fn (BookCategory $bookCategory) =>
                $bookCategory->category->getCategoryName(),
                $this->categories->toArray()
            ),
            'authors' => array_map(
                static fn (BookAuthor $bookAuthor) => $bookAuthor->author->getName(),
                $this->bookAuthors->toArray()
            )
        ];
    }
}