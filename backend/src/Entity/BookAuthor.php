<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class BookAuthor
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: 'bookAuthors')]
    #[ORM\JoinColumn(nullable: false)]
    private Book $book;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Author::class, inversedBy: 'bookAuthor')]
    #[ORM\JoinColumn(nullable: false)]
    public Author $author;
}