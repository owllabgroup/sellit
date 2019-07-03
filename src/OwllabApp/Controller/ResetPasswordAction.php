<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:31 AM
 */

namespace OwllabApp\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use OwllabApp\Controller\Interfaces\ResetPasswordActionInterface;
use OwllabApp\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use OwllabApp\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class ResetPasswordAction
 * @package OwllabApp\Controller
 */
class ResetPasswordAction extends Controller implements ResetPasswordActionInterface
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var UserPasswordEncoderInterface
     */
    protected $userPasswordEncoder;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var JWTTokenManagerInterface
     */
    protected $tokenManager;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * ResetPasswordAction constructor.
     *
     * @param ValidatorInterface $validator
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     * @param EntityManagerInterface $entityManager
     * @param UserRepositoryInterface $userRepository
     * @param JWTTokenManagerInterface $tokenManager
     */
    public function __construct(
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        UserRepositoryInterface $userRepository,
        JWTTokenManagerInterface $tokenManager
    )
    {
        $this->validator = $validator;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->tokenManager = $tokenManager;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @return UserPasswordEncoderInterface
     */
    public function getUserPasswordEncoder(): UserPasswordEncoderInterface
    {
        return $this->userPasswordEncoder;
    }

    /**
     * @return JWTTokenManagerInterface
     */
    public function getTokenManager(): JWTTokenManagerInterface
    {
        return $this->tokenManager;
    }

    /**
     * @return UserRepositoryInterface
     */
    public function getUserRepository(): UserRepositoryInterface
    {
        return $this->userRepository;
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    public function __invoke(User $data, Request $request)
    {
        $this->getValidator()->validate($data);
        $data->setPassword(
            $this->getUserPasswordEncoder()->encodePassword(
                $data, $data->getNewPassword()
            )
        );
        $data->setPasswordChangeDate(time());
        $this->getEntityManager()->flush();
        $token = $this->getTokenManager()->create($data);
        return new JsonResponse(['token' => $token]);
    }
}