<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:10 AM
 */

namespace OwllabApp\EventSubscriber\Interfaces;

use OwllabApp\Security\UserConfirmationService;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/**
 * Interface UserConfirmationSubscriberInterface
 * @package OwllabApp\EventSubscriber\Interfaces
 */
interface UserConfirmationSubscriberInterface extends SubscriberInterface
{
    /**
     * @return UserConfirmationService
     */
    public function getUserConfirmationService(): UserConfirmationService;

    /**
     * @param GetResponseForControllerResultEvent $event
     *
     * @return mixed
     */
    public function confirmUser(GetResponseForControllerResultEvent $event);
}