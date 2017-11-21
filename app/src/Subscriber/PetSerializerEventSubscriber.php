<?php

namespace App\Subscriber;

use App\Entity\Pet\Pet;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;

class PetSerializerEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'class' => Pet::class,
                'format' => 'json',
                'priority' => 0,
            ),
        );
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $visitor = $event->getVisitor();
        $object  = $event->getObject();

        $characteristics = [];
        foreach ($object->getCharacteristics() as $characteristic) {
            $characteristics[$characteristic->getCharacteristic()->getName()] = $characteristic->getValue();
        }


        $visitor->addData('compact_characteristics', $characteristics);
    }
}