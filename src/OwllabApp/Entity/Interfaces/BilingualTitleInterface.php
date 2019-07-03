<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:02 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface BilingualTitleInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface BilingualTitleInterface
{
    /**
     * @return string|null
     */
    public function getFaTitle(): ? string;

    /**
     * @param string|null $faTitle
     *
     * @return self
     */
    public function setFaTitle(? string $faTitle): self;

    /**
     * @return string|null
     */
    public function getEnTitle(): ? string;

    /**
     * @param string|null $enTitle
     *
     * @return self
     */
    public function setEnTitle(? string $enTitle): self;
}