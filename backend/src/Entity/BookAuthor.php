<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

#[ORM\Entity]
class BookAuthor
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\ManyToMany(targetEntity: Book::class, inversedBy: 'bookAuthors')]
    #[ORM\JoinColumn(nullable: false)]
    private int $bookId;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'bookAuthor')]
    #[ORM\JoinColumn(nullable: false)]
    private int $authorId;
}