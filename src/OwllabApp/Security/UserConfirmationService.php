<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 4:17 PM
 */

namespace OwllabApp\Security;

use OwllabApp\Exception\InvalidConfirmationTokenException;
use OwllabApp\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use OwllabApp\Security\Interfaces\UserConfirmationServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * Class UserConfirmationService
 * @package OwllabApp\Security
 */
class UserConfirmationService implements UserConfirmationServiceInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * UserConfirmationService constructor.
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $entityManager
     * @param LoggerInterface $logger
     */
    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    )
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string $confirmationToken
     *
     * @throws InvalidConfirmationTokenException
     */
    public function confirmUser(string $confirmationToken)
    {
        $user = $this->getUserRepository()
            ->findOneBy(
                ['confirmationToken' => $confirmationToken]
            );

        if (!$user) {
            throw new InvalidConfirmationTokenException();

        }
        $user->setEnabled(true);
        $user->setConfirmationToken(null);
        $this->getEntityManager()->flush();
    }
}