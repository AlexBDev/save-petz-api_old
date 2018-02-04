<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 04/02/18
 * Time: 12:52
 */

namespace App\Controller\API;


use App\Entity\Pet\PetCharacteristicValue;
use FOS\RestBundle\Controller\Annotations as Rest;

class FormController extends ApiController
{
    /**
     * @Rest\Get("/forms/values")
     */
    public function getValuesAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $characteristics = $manager->getRepository(PetCharacteristicValue::class)->findAll();

        $data = [];
        foreach ($characteristics as $ch) {
            $type = strtolower($ch->getCharacteristic()->getName());

//            [
//                [type => 'ets' [data => []]]
//            ]

            $data[$type][] = [
                'name' => $ch->getValue(),
                'value' => $ch->getId(),
            ];
        }

        $values = [];
        foreach ($data as $type => $d) {
            $values[] = [
                'type' => $type,
                'data' => $d,
            ];
        }

        dump($values);
        die;

        return $this->handleData($pet);
    }
}