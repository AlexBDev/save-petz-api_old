<?php

namespace App\Controller\API;


use App\Entity\Pet\Pet;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class PetController extends ApiController implements ClassResourceInterface
{
    public function cgetAction(Request $request)
    {
        $data = $this->getElasticaRepository(Pet::class)->search($request);

        return $this->handleData($data);
    }
}