<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route(path:"/user/{id}", methods: ['GET'])]
    public function getUserInfo(int $id): Response
    {
        return $this->json('user by id: '.$id);
    }

    #[Route(path: '/user/{id}', methods: ['DELETE'])]
    public function deleteUser(int $id): Response
    {
        return $this->json('delete user with id: '.$id);
    }
}