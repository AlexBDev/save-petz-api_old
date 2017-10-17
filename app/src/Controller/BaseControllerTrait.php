<?php

namespace App\Controller;

use FOS\ElasticaBundle\Repository;

trait BaseControllerTrait
{
    public function getElasticaRepository(string $repository): Repository
    {
       return $this->get('fos_elastica.manager')->getRepository($repository);

    }
}