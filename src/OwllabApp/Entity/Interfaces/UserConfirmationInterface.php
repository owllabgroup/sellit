<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/8/19
 * Time: 11:19 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface UserConfirmationInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface UserConfirmationInterface
{
    /**
     * @return string|null
     */
    public function getConfirmationToken(): ? string;
}