<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:33 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface PhoneInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface PhoneInterface
{
    /**
     * @return string|null
     */
    public function getPhone(): ? string;

    /**
     * @param string|null $phone
     *
     * @return PhoneInterface
     */
    public function setPhone(? string $phone): PhoneInterface ;
}