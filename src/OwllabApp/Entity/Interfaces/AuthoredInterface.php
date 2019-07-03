<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/10/19
 * Time: 6:12 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface AuthoredInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface AuthoredInterface
{
    /**
     * @return UserInterface|null
     */
    public function getAuthor(): ? UserInterface;

    /**
     * @param UserInterface $author
     *
     * @return AuthoredInterface
     */
    public function setAuthor(UserInterface $author): AuthoredInterface;
}