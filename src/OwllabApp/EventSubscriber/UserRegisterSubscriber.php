<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/30/19
 * Time: 10:48 AM
 */

namespace OwllabApp\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use OwllabApp\Email\Interfaces\MailerInterface;
use OwllabApp\Entity\Interfaces\UserInterface;
use OwllabApp\Security\TokenGenerator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class PasswordHashSubscriber
 * @package OwllabApp\EventSubscriber
 */
class UserRegisterSubscriber implements EventSubscriberInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $passwordEncoder;

    /**
     * @var TokenGenerator
     */
    protected $tokenGenerator;

    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * UserRegisterSubscriber constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param TokenGenerator $tokenGenerator
     * @param MailerInterface $mailer
     */
    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        TokenGenerator $tokenGenerator,
        MailerInterface $mailer
    )
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->tokenGenerator = $tokenGenerator;
        $this->mailer = $mailer;
    }

    /**
     * @return UserPasswordEncoderInterface
     */
    public function getPasswordEncoder(): UserPasswordEncoderInterface
    {
        return $this->passwordEncoder;
    }

    /**
     * @return TokenGenerator
     */
    public function getTokenGenerator(): TokenGenerator
    {
        return $this->tokenGenerator;
    }

    /**
     * @return MailerInterface
     */
    public function getMailer(): MailerInterface
    {
        return $this->mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['userRegistered', EventPriorities::PRE_WRITE]
        ];
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     * @throws \Exception
     */
    public function userRegistered(GetResponseForControllerResultEvent $event)
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$user instanceof UserInterface || !in_array($method, [Request::METHOD_POST])) {
            return;
        }
        $user->setPassword(
            $this->getPasswordEncoder()->encodePassword(
                $user, $user->getPassword()
            )
        )->setConfirmationToken(
            $this->getTokenGenerator()->getRandomSecureToken()
        );
        $this->getMailer()->sendConfirmationEmail($user);
    }
}