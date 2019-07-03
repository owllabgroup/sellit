<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/12/19
 * Time: 5:40 PM
 */

namespace OwllabApp\Form;

use OwllabApp\Entity\PostImage;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AvatarType
 * @package OwllabApp\Form
 */
class PostImageType extends AbstractType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            self::DATE_CLASS_OPTION => PostImage::class,
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
        return parent::getBlockPrefix() . '_post';
    }
}