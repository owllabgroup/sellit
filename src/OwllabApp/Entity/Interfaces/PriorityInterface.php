<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:50 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface PriorityInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface PriorityInterface
{
    /**
     * @return int|null
     */
    public function getPriority(): ? int;

    /**
     * @param int|null $priority
     *
     * @return self
     */
    public function setPriority(? int $priority): self;
}