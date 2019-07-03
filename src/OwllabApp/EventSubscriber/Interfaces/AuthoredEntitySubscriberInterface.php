<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/10/19
 * Time: 6:15 PM
 */

namespace OwllabApp\EventSubscriber\Interfaces;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/**
 * Interface AuthoredEntitySubscriberInterface
 * @package OwllabApp\EventSubscriber\Interfaces
 */
interface AuthoredEntitySubscriberInterface extends SubscriberInterface
{
    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function getAuthenticatedUser(GetResponseForControllerResultEvent $event);
}