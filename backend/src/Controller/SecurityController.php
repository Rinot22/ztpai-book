<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

class SecurityController extends AbstractController
{
    //TODO: change routes for all methods
    #[Route(path: '/login', methods: ['GET'])]
    public function login(): RedirectResponse
    {
        return $this->redirect('/main');
    }

    public function logout(): RedirectResponse
    {
        return $this->redirect('/main');
    }

    #[Route(path: '/registration', methods: ['POST'])]
    public function registration(): RedirectResponse
    {
        return $this->redirect('/main');
    }
}