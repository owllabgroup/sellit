<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 6:54 PM
 */

namespace OwllabApp\EventSubscriber\Interfaces;

use OwllabApp\Exception\Interfaces\EmptyBodyExceptionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Interface EmptyBodySubscriberInterface
 * @package OwllabApp\Interfaces\EventSubscriber
 */
interface EmptyBodySubscriberInterface extends SubscriberInterface
{
    /**
     * @param GetResponseEvent $event
     *
     * @throws EmptyBodyExceptionInterface
     */
    public function handleEmptyBody(GetResponseEvent $event);
}