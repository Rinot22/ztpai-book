<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class BookCategory
{
    private int $bookId;

    private int $categoryId;

}