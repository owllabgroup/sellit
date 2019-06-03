<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 8:57 PM
 */

namespace OwllabApp\Serializer\Interfaces;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;

/**
 * Interface UserAttributeNormalizerInterface
 * @package OwllabApp\Serializer\Interfaces
 */
interface UserAttributeNormalizerInterface extends ContextAwareNormalizerInterface, SerializerAwareInterface
{
    const USER_ATTRIBUTE_NORMALIZER_ALREADY_CALLED = 'USER_ATTRIBUTE_NORMALIZER_ALREADY_CALLED';

    /**
     * @return TokenStorageInterface
     */
    public function getTokenStorage(): TokenStorageInterface;

    /**
     * @param $data
     * @param null $format
     * @param array $context
     * @return bool
     */
    public function supportsNormalization(
        $data,
        $format = null,
        array $context = []);

    /**
     * @param mixed $object
     * @param null $format
     * @param array $context
     *
     * @return mixed
     */
    public function normalize($object, $format = null, array $context = []);

    /**
     * @param $object
     *
     * @return bool
     */
    public function isUserHimself($object): bool;

    /**
     * @param $object
     * @param $format
     * @param array $context
     */
    public function passOn($object, $format, array $context);
}