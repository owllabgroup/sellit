<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:31 AM
 */

namespace OwllabApp\Controller\Interfaces;

use ApiPlatform\Core\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use OwllabApp\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Interface ResetPasswordActionInterface
 * @package OwllabApp\Controller\Interfaces
 */
interface ResetPasswordActionInterface extends ControllerInterface
{
    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface;

    /**
     * @return UserPasswordEncoderInterface
     */
    public function getUserPasswordEncoder(): UserPasswordEncoderInterface;

    /**
     * @return JWTTokenManagerInterface
     */
    public function getTokenManager(): JWTTokenManagerInterface;

    /**
     * @return UserRepositoryInterface
     */
    public function getUserRepository(): UserRepositoryInterface;

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface;
}