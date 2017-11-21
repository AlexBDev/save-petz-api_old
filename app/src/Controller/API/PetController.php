<?php

namespace App\Controller\API;


use App\Entity\Pet\Pet;
use App\Model\ApiQuery;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\Get;

class PetController extends ApiController implements ClassResourceInterface
{
    /**
     * @Get("/pets")
     */
    public function cgetAction(ApiQuery $apiQuery)
    {
        $data = $this->getElasticaRepository(Pet::class)->search($apiQuery);

        return $this->handleData($data);
    }

    /**
     * @Get("/pets/{id}")
     */
    public function showAction(Pet $pet)
    {
        return $this->handleData($pet);
    }
}