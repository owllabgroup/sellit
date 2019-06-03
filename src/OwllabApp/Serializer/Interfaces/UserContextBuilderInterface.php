<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 8:55 PM
 */

namespace OwllabApp\Serializer\Interfaces;

use ApiPlatform\Core\Serializer\SerializerContextBuilderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Interface UserContextBuilderInterface
 * @package OwllabApp\Serializer\Interfaces
 */
interface UserContextBuilderInterface extends SerializerContextBuilderInterface
{
    /**
     * @return SerializerContextBuilderInterface
     */
    public function getDecorated();

    /**
     * @return AuthorizationCheckerInterface
     */
    public function getAuthorizationChecker();
}