<?php

namespace App\Service;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use phpDocumentor\Reflection\Types\This;

class AuthorService
{

    public function __construct(private AuthorRepository $ar)
    {
    }
    
    public function getAuthorById(int $id): Author
    {
        return $this->ar->find($id);
    }
    
    public function getAuthors(): array
    {
        return $this->ar->findAllAuthors();
    }
}