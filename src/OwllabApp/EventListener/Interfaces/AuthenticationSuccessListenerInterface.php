<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/8/19
 * Time: 11:21 PM
 */

namespace OwllabApp\EventListener\Interfaces;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

/**
 * Class AuthenticationSuccessListenerInterface
 * @package OwllabApp\EventListener\Interfaces
 */
interface AuthenticationSuccessListenerInterface
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event);
}