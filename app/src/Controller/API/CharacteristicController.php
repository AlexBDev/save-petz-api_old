<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 30/01/18
 * Time: 07:54
 */

namespace App\Controller\API;


use App\Entity\Pet\PetCharacteristicValue;
use App\Form\Pet\PetCharacteristicsType;
use FOS\RestBundle\Controller\Annotations as Rest;

class CharacteristicController extends ApiController
{
    /**
     * @Rest\Get("/characteristics")
     */
    public function cgetAction()
    {
        return $this->handleData(
            $this->getDoctrine()
                ->getRepository(PetCharacteristicValue::class)
                ->findAll()
        );
    }

    /**
     * @Rest\Get("/characteristics-type/")
     */
    public function cgetTypeAction()
    {
        return $this->handleData(
            $this->getDoctrine()
                ->getRepository(PetCharacteristicsType::class)
                ->findAll()
        );
    }
}

