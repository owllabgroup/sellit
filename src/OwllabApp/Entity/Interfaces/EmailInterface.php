<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:33 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface EmailInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface EmailInterface
{
    /**
     * @return string|null
     */
    public function getEmail(): ? string;

    /**
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(? string $email): self ;
}