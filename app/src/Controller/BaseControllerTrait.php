<?php

namespace App\Controller;

use FOS\ElasticaBundle\Repository;

trait BaseControllerTrait
{
    public function getElasticaRepository(string $repository): Repository
    {
       return $this->get('fos_elastica.manager')->getRepository($repository);
    }

    public function persistEntity($entity)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($entity);
        $em->flush();
    }
}