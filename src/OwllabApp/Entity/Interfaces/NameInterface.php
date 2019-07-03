<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:49 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**\
 * Interface NameInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface NameInterface
{
    /**
     * @return null|string
     */
    public function getName(): ? string;

    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(? string $name): self ;
}