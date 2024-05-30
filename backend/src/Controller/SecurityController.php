<?php

declare(strict_types=1);

namespace App\Controller;



use App\Controller\Request\RegistrationRequest;
use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class SecurityController extends AbstractController
{
    public function __construct()
    {
    }
    #[Route('/register', name: 'register', methods: ['POST'])]
    public function register(
        #[MapRequestPayload(acceptFormat: 'json')] RegistrationRequest $request,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher,
        JWTTokenManagerInterface $jwtManager
    ): JsonResponse {

        $user = (new User())->setEmail($request->email)->setUserName($request->username);
        $user->setPassword($passwordHasher->hashPassword($user, $request->password));
//        dd($user);
        $userRepository->save($user);
        $token = $jwtManager->create($user);

        return new JsonResponse(['token' => $token], Response::HTTP_CREATED);
    }
}