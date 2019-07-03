<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 3:22 PM
 */

namespace OwllabApp\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use OwllabApp\Entity\UserConfirmation;
use OwllabApp\EventSubscriber\Interfaces\UserConfirmationSubscriberInterface;
use OwllabApp\Security\UserConfirmationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class UserConfirmationSubscriber
 * @package OwllabApp\EventSubscriber
 */
class UserConfirmationSubscriber implements UserConfirmationSubscriberInterface
{
    /**
     * @var UserConfirmationService
     */
    protected $userConfirmationService;

    /**
     * UserConfirmationSubscriber constructor.
     *
     * @param UserConfirmationService $userConfirmationService
     */
    public function __construct(UserConfirmationService $userConfirmationService)
    {
        $this->userConfirmationService = $userConfirmationService;
    }

    /**
     * @return UserConfirmationService
     */
    public function getUserConfirmationService(): UserConfirmationService
    {
        return $this->userConfirmationService;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['confirmUser', EventPriorities::POST_VALIDATE]
        ];
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     *
     * @throws \OwllabApp\Exception\InvalidConfirmationTokenException
     */
    public function confirmUser(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();
        $confirmationToken = $event->getControllerResult();
        if ('api_user_confirmations_post_collection' != $request->get('_route')) {
            return;
        }


        if ($confirmationToken instanceof UserConfirmation) {

            $this->getUserConfirmationService()->confirmUser($confirmationToken->getConfirmationToken());
            $event->setResponse(new JsonResponse(null, Response::HTTP_OK));
        } else {
            throw new NotAcceptableHttpException();
        }
    }
}