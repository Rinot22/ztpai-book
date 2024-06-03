<?php

namespace App\Service;

use App\Entity\News;
use App\Repository\NewsRepository;

class NewsService
{
    public function __construct(private NewsRepository $nr)
    {}

    public function getAllNews(): array
    {
        return $this->nr->findAllNews();
    }

    public function getNews(int $id): News
    {
        return $this->nr->find($id);
    }
}