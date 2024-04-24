<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

readonly class RegisterService
{
    public function __construct(private EntityManagerInterface $entityManager, private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    /**
     * @param User $user
     * @return void
     */
    public function register(User $user): void
    {
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                $user->getPlainPassword()
            )
        );
        $user->eraseCredentials();
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}