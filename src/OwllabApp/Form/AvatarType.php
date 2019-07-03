<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/12/19
 * Time: 5:40 PM
 */

namespace OwllabApp\Form;

use OwllabApp\Entity\Avatar;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AvatarType
 * @package OwllabApp\Form
 */
class AvatarType extends AbstractType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            self::DATE_CLASS_OPTION => Avatar::class,
        ));
    }

    /**
     * @return string|null
     */
    public function getParent()
    {
        return ImageType::class;
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return parent::getBlockPrefix() . '_avatar';
    }
}