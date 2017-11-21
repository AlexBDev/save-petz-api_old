<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 20/10/17
 * Time: 10:53
 */

namespace App\Resolver;



use App\Model\ApiQuery;
use Symfony\Component\HttpFoundation\Request;

class ApiQueryResolver
{
    public static function resolve(Request $request)
    {
        $apiQuery = new ApiQuery();

        if (null !== $id  = $request->query->get('id')) {
            $apiQuery->setId($id);
        }

        if (null !== $limit = $request->query->getInt('limit', 10)) {
            $apiQuery->setLimit($limit);
        }

        if (null !== $offset = $request->query->getInt('offset', 0)) {
            $apiQuery->setOffset($offset);
        }

        foreach (explode(',', $request->get('sort')) as $field) {
            $apiQuery->addSort($field, 'asc');
        }

        foreach (explode(',', $request->get('desc')) as $field) {
            $apiQuery->addSort($field, 'desc');
        }

        return $apiQuery;
    }
}

