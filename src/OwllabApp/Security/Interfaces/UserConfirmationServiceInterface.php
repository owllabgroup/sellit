<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/8/19
 * Time: 10:59 PM
 */

namespace OwllabApp\Security\Interfaces;

use Doctrine\ORM\EntityManagerInterface;
use OwllabApp\Exception\InvalidConfirmationTokenException;
use OwllabApp\Repository\UserRepository;
use Psr\Log\LoggerInterface;

/**
 * Interface UserConfirmationServiceInterface
 * @package OwllabApp\Security\Interfaces
 */
interface UserConfirmationServiceInterface
{
    /**
     * @return UserRepository
     */
    public function getUserRepository(): UserRepository;

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface;

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * @param string $confirmationToken
     *
     * @throws InvalidConfirmationTokenException
     */
    public function confirmUser(string $confirmationToken);
}