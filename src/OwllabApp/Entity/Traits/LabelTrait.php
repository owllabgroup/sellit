<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:05 PM
 */

namespace OwllabApp\Entity\Traits;

use OwllabApp\Entity\Interfaces\ConstantInterface;
use OwllabApp\Utility\Functions;

/**
 * Trait LabelTrait
 * @package OwllabApp\Entity\Traits
 */
trait LabelTrait
{
    /**
     * @return string|null
     */
    abstract public function getFaLabel(): ? string ;

    /**
     * @return string|null
     */
    abstract public function getEnLabel(): ? string ;

    /**
     * @param string $preferLocale
     *
     * @return string|null
     */
    public function getLabel(string $preferLocale = ConstantInterface::PERSIAN_LOCALE): ? string
    {
        Functions::getPreferLabel($this->getFaLabel(), $this->getEnLabel(), $preferLocale);
    }
}