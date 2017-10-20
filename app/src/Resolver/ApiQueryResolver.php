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

        foreach (explode(',', $request->get('sort')) as $field) {
            $apiQuery->addSort($field, 'asc');
        }

        foreach (explode(',', $request->get('desc')) as $field) {
            $apiQuery->addSort($field, 'desc');
        }

        return $apiQuery;
    }
}

