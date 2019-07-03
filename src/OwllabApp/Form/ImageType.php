<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 5:13 PM
 */

namespace OwllabApp\Form;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, array(
                self::LABEL_OPTION    => 'label.file',
                self::REQUIRED_OPTION => false
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            self::CSRF_PROTECTION_OPTION => false
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return parent::getBlockPrefix() . self::_IMAGE . self::_TYPE;
    }
}