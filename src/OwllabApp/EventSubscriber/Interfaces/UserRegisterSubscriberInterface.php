<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:12 AM
 */

namespace OwllabApp\EventSubscriber\Interfaces;

use OwllabApp\Email\Interfaces\MailerInterface;
use OwllabApp\Security\TokenGenerator;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Interface UserRegisterSubscriberInterface
 * @package OwllabApp\EventSubscriber\Interfaces
 */
interface UserRegisterSubscriberInterface
{
    /**
     * @return UserPasswordEncoderInterface
     */
    public function getPasswordEncoder(): UserPasswordEncoderInterface;

    /**
     * @return TokenGenerator
     */
    public function getTokenGenerator(): TokenGenerator;

    /**
     * @return MailerInterface
     */
    public function getMailer(): MailerInterface;

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function userRegistered(GetResponseForControllerResultEvent $event);
}