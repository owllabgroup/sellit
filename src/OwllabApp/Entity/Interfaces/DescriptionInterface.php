<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:01 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface DescriptionInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface DescriptionInterface
{
    /**
     * @return string|null
     */
    public function getDescription(): ? string;

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(? string $description): self;
}