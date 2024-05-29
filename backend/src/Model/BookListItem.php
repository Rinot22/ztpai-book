<?php

namespace App\Model;

use Doctrine\Common\Collections\Collection;

class BookListItem
{
    private int $id;
    private string $title;
    private string $description;
    private float $price;
    private int $publicationDate;
    private Collection $authors;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getPublicationDate(): int
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(int $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function setAuthors(Collection $authors): self
    {
        $this->authors = $authors;

        return $this;
    }


}