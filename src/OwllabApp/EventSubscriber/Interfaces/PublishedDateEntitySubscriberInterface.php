<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/30/19
 * Time: 2:08 PM
 */

namespace OwllabApp\EventSubscriber\Interfaces;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/**
 * Interface PublishedDateEntitySubscriberInterface
 * @package OwllabApp\Interfaces\EventSubscriber
 */
interface PublishedDateEntitySubscriberInterface extends SubscriberInterface
{
    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function setDatePublished(GetResponseForControllerResultEvent $event);
}