<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/12/19
 * Time: 2:08 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface AvatarInterface
 *
 * @package OwllabApp\Entity\Interfaces
 */
interface AvatarInterface extends ImageInterface
{
    /**
     * @return UserInterface|null
     */
    public function getUser(): ? UserInterface;

    /**
     * @param UserInterface|null $user
     *
     * @return AvatarInterface
     */
    public function setUser(? UserInterface $user): AvatarInterface;
}