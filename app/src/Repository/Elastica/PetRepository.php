<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 16/10/17
 * Time: 15:07
 */

namespace App\Repository\Elastica;


use Elastica\Query;
use FOS\ElasticaBundle\Repository;
use Symfony\Component\HttpFoundation\Request;

class PetRepository extends Repository
{
    public function search(Request $request)
    {
        $query = new Query();
        $query->setSort([
            'created_at' => [
                'order' => 'asc',
            ]
        ]);

        return $this->find($query, $request->query->getInt('limit', $request->query->getInt('limit', 20)));
    }
}