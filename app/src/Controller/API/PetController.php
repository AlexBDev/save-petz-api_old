<?php

namespace App\Controller\API;


use App\Entity\Pet\Pet;
use FOS\RestBundle\Routing\ClassResourceInterface;

class PetController extends ApiController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository(Pet::class)->findAll();

        return $this->handleData(array_slice($data, 0, 10));
    }
}