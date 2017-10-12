<?php

namespace App\Controller\API;


use App\Entity\Pet\PetType;
use FOS\RestBundle\Routing\ClassResourceInterface;

class PetTypeController extends ApiController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository(PetType::class)->findAll();

        return $this->handleData($data);
    }
}