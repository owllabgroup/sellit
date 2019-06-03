<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/30/19
 * Time: 2:08 PM
 */

namespace OwllabApp\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use OwllabApp\EventSubscriber\Interfaces\PublishedDateEntitySubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class PublishedDateEntitySubscriber implements PublishedDateEntitySubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setDatePublished', EventPriorities::PRE_WRITE]
        ];
    }


    public function setDatePublished(GetResponseForControllerResultEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        if (!$entity instanceof PublishedDateEntityInterface || Request::METHOD_POST !== $method) {
            return;
        }
        $entity->setPublished(new \DateTime());
    }
}