<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:11 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface LabelInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface LabelInterface
{
    /**
     * @return string|null
     */
    public function getFaLabel(): ? string ;

    /**
     * @return string|null
     */
    public function getEnLabel(): ? string ;

    /**
     * @param string $preferLocale
     *
     * @return string|null
     */
    public function getLabel(string $preferLocale = ConstantInterface::PERSIAN_LOCALE): ? string;
}