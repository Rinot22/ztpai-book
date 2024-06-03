<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{

    public function __construct(private CategoryRepository $cr)
    {
    }

    public function getAllCategories(): array
    {
        return $this->cr->findAllCategories();
    }
}