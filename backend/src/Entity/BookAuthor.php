<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class BookAuthor
{
    #[ORM\ManyToMany(targetEntity: Book::class, inversedBy: 'bookAuthors')]
    #[ORM\JoinColumn(nullable: false)]
    private int $bookId;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'bookAuthor')]
    #[ORM\JoinColumn(nullable: false)]
    private int $authorId;
}