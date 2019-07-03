<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:24 AM
 */

namespace OwllabApp\Form;

use OwllabApp\Entity\Interfaces\ConstantInterface;
use Symfony\Component\Form\AbstractType as BaseClass;

/**
 * Class AbstractForm
 * @package OwllabApp\Form
 */
abstract class AbstractType extends BaseClass implements ConstantInterface
{
    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return self::OWLLABGROUP;
    }
}