<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:41 PM
 */

namespace OwllabApp\Utility;

use OwllabApp\Entity\Interfaces\ConstantInterface;

/**
 * Class Functions
 * @package OwllabApp\Utility
 */
class Functions implements ConstantInterface
{
    /**
     * @param string|null $faLabel
     * @param string|null $enLabel
     * @param string|null $preferLocale
     * 
     * @return string|null
     */
    public static function getPreferLabel(? string $faLabel, ? string $enLabel, ? string $preferLocale = self::PERSIAN_LOCALE): ? string
    {
        switch ($preferLocale) {
            case (ConstantInterface::PERSIAN_LOCALE && !empty($faLabel));
                return $faLabel();
            case (ConstantInterface::ENGLISH_LOCALE && !empty($enLabel));
                return $enLabel();
            case ConstantInterface::BOTH_LOCALE:
                return $faLabel() . ' (' . $enLabel() . ')';
            default:
                if (!empty($faLabel())) {
                    return $faLabel();
                } elseif (!empty($enLabel())) {
                    return $enLabel();
                } else {
                    return null;
                }
        }
    }
}