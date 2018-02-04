<?php
namespace App\EventListener;

use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegistrationListener implements EventSubscriberInterface
{

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationCompleted',
            FOSUserEvents::REGISTRATION_FAILURE => 'onRegistrationFailure',
        ];
    }

    public function onRegistrationCompleted(FormEvent $event)
    {
        $event->setResponse(new JsonResponse(['registration' => 'success']));
    }

    public function onRegistrationFailure(FormEvent $event)
    {
        $content = [];
        $content['registration'] = 'failure';

        foreach ($event->getForm()->getErrors(true) as $formError) {
            $content['errors'][$formError->getOrigin()->getName()] = $formError->getMessage();
        }

        $event->setResponse(new JsonResponse($content));
    }
}