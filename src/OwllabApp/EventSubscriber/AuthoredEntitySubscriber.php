<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/30/19
 * Time: 10:48 AM
 */

namespace OwllabApp\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use OwllabApp\Entity\Interfaces\AuthoredInterface;
use OwllabApp\Entity\Interfaces\UserInterface;
use OwllabApp\EventSubscriber\Interfaces\AuthoredEntitySubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class PasswordHashSubscriber
 * @package App\EventSubscriber
 */
class AuthoredEntitySubscriber implements AuthoredEntitySubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * AuthoredEntitySubscriber constructor.
     * @param TokenStorageInterface $tokenStorage
     */
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

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['getAuthenticatedUser', EventPriorities::PRE_WRITE]
        ];
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function getAuthenticatedUser(GetResponseForControllerResultEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        $author = $this->getTokenStorage()->getToken()->getUser();
        if ((!$entity instanceof AuthoredInterface)
            || !$author instanceof UserInterface
            || Request::METHOD_POST !== $method) {

            return;
        }
        $entity->setAuthor($author);
    }
}