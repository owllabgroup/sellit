<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:26 PM
 */

namespace OwllabApp\Controller\Interfaces;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Interface UserAdminControllerInterface
 * @package OwllabApp\Controller\Interfaces
 */
interface UserAdminControllerInterface extends ControllerInterface
{
    /**
     * @return UserPasswordEncoderInterface
     */
    public function getPasswordEncoder(): UserPasswordEncoderInterface;
}