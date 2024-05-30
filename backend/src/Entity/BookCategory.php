<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class BookCategory
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\ManyToMany(targetEntity: Book::class, inversedBy: 'bookAuthors')]
    #[ORM\JoinColumn(nullable: false)]
    private int $bookId;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'bookAuthors')]
    #[ORM\JoinColumn(nullable: false)]
    private int $categoryId;

}