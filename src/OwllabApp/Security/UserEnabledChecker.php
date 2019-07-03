<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 2:57 PM
 */

namespace OwllabApp\Security;

use OwllabApp\Entity\User;
use OwllabApp\Security\Interfaces\UserEnabledCheckerInterface;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserEnabledChecker
 * @package OwllabApp\Security
 */
class UserEnabledChecker implements UserEnabledCheckerInterface
{
    /**
     * @param UserInterface $user
     */
    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof User) {
            return;
        }
        if (!$user->getEnabled()) {
            throw new DisabledException();
        }
    }

    /**
     * @param UserInterface $user
     */
    public function checkPostAuth(UserInterface $user)
    {

    }
}