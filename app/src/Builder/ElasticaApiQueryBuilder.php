<?php

namespace App\Builder;


use App\Model\ApiQuery;
use Elastica\Query;

class ElasticaApiQueryBuilder
{
    public static function build(ApiQuery $api)
    {
        $query = new Query();

        foreach ($api->getSorts() as $field => $order) {
            if (!empty($field) && !in_array($field, ['created_at', 'updated_at'])) {
                $query->addSort([
                    $field.'.keyword' => [
                        'order' => $order
                    ]
                ]);
            }
        }

        return $query;
    }
}
