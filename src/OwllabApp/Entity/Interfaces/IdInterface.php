<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:26 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface IdInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface IdInterface
{
    /**
     * @return int|null
     */
    public function getId(): ? int;

    /**
     * @return bool
     */
    public function hasId(): bool;
}