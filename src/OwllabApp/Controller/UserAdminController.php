<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 8:29 PM
 */

namespace OwllabApp\Controller;

use OwllabApp\Controller\Interfaces\UserAdminControllerInterface;
use OwllabApp\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController as BaseAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserAdminController
 * @package OwllabApp\Controller
 */
class UserAdminController extends BaseAdminController implements UserAdminControllerInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @return UserPasswordEncoderInterface
     */
    public function getPasswordEncoder(): UserPasswordEncoderInterface
    {
        return $this->passwordEncoder;
    }

    /**
     * @param User $entity
     */
    protected function persistEntity($entity)
    {
        $this->encodeUserPassword($entity);
        parent::persistEntity($entity);
    }

    /**
     * @param User $entity
     */
    protected function updateEntity($entity)
    {
        $this->encodeUserPassword($entity);
        parent::updateEntity($entity);
    }

    /**
     * @param User $entity
     */
    private function encodeUserPassword($entity): void
    {
        $entity->setPassword(
            $this->getPasswordEncoder()->encodePassword(
                $entity,
                $entity->getPassword()
            )
        );
    }
}