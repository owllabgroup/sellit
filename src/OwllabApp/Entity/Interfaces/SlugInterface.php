<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 6:40 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface SlugInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface SlugInterface
{
    /**
     * @return string|null
     */
    public function getSlug(): ? string;

    /**
     * @param string|null $slug
     *
     * @return SlugInterface
     */
    public function setSlug(? string $slug): SlugInterface;
}