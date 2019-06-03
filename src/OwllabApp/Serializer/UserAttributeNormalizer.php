<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 11:20 AM
 */

namespace OwllabApp\Serializer;

use OwllabApp\Serializer\Interfaces\UserAttributeNormalizerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

class UserAttributeNormalizer implements UserAttributeNormalizerInterface {
    use SerializerAwareTrait;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return TokenStorageInterface
     */
    public function getTokenStorage(): TokenStorageInterface
    {
        return $this->tokenStorage;
    }

    /**
     * @param $data
     * @param null $format
     * @param array $context
     * @return bool
     */
    public function supportsNormalization(
        $data,
        $format = null,
        array $context = [])
    {
        if (isset($context[self::USER_ATTRIBUTE_NORMALIZER_ALREADY_CALLED])) {
            return false;
        }
        return $data instanceof UserInterface;
    }

    /**
     * @param mixed $object
     * @param null $format
     * @param array $context
     * @return array|bool|float|int|string
     */
    public function normalize($object, $format = null, array $context = [])
    {
        if ($this->isUserHimself($object)) {
            $context['groups'][] = 'get-owner';
        }

        return $this->passOn($object, $format, $context);
    }

    /**
     * @param $object
     *
     * @return bool
     */
    public function isUserHimself($object): bool
    {
        if ($object instanceof UserInterface) {
            return $object->getUsername() == $this->getTokenStorage()->getToken()->getUsername();
        }

        return false;
    }

    /**
     * @param $object
     * @param $format
     * @param array $context
     *
     * @return array|bool|float|int|string
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function passOn($object, $format, array $context)
    {
        if (!$this->serializer instanceof NormalizerInterface) {
            throw new \LogicException(
                sprintf(
                    'Cannot normalize object "%s" becouse the injected serializer is not a normalizer.',
                    $object
                )
            );
        }

        $context[self::USER_ATTRIBUTE_NORMALIZER_ALREADY_CALLED] = true;

        return $this->serializer->normalize($object, $format, $context);
    }
}