<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:46 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface TitleInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface TitleInterface
{
    /**
     * @return string|null
     */
    public function getTitle(): ? string;

    /**
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(? string $title): self;
}