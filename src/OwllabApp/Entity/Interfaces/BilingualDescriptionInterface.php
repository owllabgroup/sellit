<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:01 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface BilingualDescriptionInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface BilingualDescriptionInterface
{
    /**
     * @return string|null
     */
    public function getFaDescription(): ? string;

    /**
     * @param string|null $faDescription
     *
     * @return self
     */
    public function setFaDescription(? string $faDescription): self;

    /**
     * @return string|null
     */
    public function getEnDescription(): ? string;

    /**
     * @param string|null $enDescription
     *
     * @return self
     */
    public function setEnDescription(? string $enDescription): self;
}