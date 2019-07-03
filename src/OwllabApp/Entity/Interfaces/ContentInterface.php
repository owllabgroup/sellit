<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:01 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface ContentInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface ContentInterface
{
    /**
     * @return string|null
     */
    public function getContent(): ? string;

    /**
     * @param string|null $content
     *
     * @return self
     */
    public function setContent(? string $content): self;
}