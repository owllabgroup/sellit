<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 6:54 PM
 */

namespace OwllabApp\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use OwllabApp\EventSubscriber\Interfaces\EmptyBodySubscriberInterface;
use OwllabApp\Exception\EmptyBodyException;
use OwllabApp\Exception\Interfaces\EmptyBodyExceptionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class EmptyBodySubscriber
 * @package OwllabApp\EventSubscriber
 */
class EmptyBodySubscriber implements EmptyBodySubscriberInterface
{

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['handleEmptyBody', EventPriorities::POST_DESERIALIZE]
        ];
    }

    /**
     * @param GetResponseEvent $event
     *
     * @throws EmptyBodyExceptionInterface
     */
    public function handleEmptyBody(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $method = $request->getMethod();
        $route = $request->get('_route');

        if (!in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])
            || !in_array($request->getContentType(), ['html', 'form'])
            || substr($route, 0, 3) !== 'api') {
            return;
        }
        $data = $event->getRequest()->get('data');
        if (null === $data) {
            throw new EmptyBodyException();
        }
    }
}