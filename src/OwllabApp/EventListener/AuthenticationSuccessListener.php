<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/1/19
 * Time: 4:06 AM
 */

namespace OwllabApp\EventListener;

use OwllabApp\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use OwllabApp\EventListener\Interfaces\AuthenticationSuccessListenerInterface;

/**
 * Class AuthenticationSuccessListener
 * @package OwllabApp\EventListener
 */
class AuthenticationSuccessListener implements AuthenticationSuccessListenerInterface
{
    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();
        if (!$user instanceof User) {
            return;
        }
        $data['id'] = $user->getId();
        $event->setData($data);
    }
}