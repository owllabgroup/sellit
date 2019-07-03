<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:38 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface FullNameInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface FullNameInterface
{
    /**
     * @return string
     */
    public function getFirstName(): ? string;

    /**
     * @param string|null $firstName
     *
     * @return FullNameInterface
     */
    public function setFirstName(? string $firstName): FullNameInterface;

    /**
     * @return string|null
     */
    public function getLastName(): ? string;

    /**
     * @param string|null $lastName
     *
     * @return FullNameInterface
     */
    public function setLastName(? string $lastName): FullNameInterface;

    /**
     * @return string|null
     */
    public function getFullName(): ? string;
}