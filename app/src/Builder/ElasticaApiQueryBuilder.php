<?php

namespace App\Builder;


use App\Model\ApiQuery;
use Elastica\Query;

class ElasticaApiQueryBuilder
{
    public static function build(ApiQuery $api)
    {
        $bool = new Query\BoolQuery();

        if (null !== $id = $api->getId()) {
            $bool->addMust(new Query\Term([
                'id' => ['value' => $id],
            ]));
        }

        $query = new Query($bool);


        foreach ($api->getSorts() as $field => $order) {
            if (!empty($field)) {
                if (!in_array($field, ['created_at', 'updated_at'])) {
                    $field .= '.keyword'; // Due to recent changes from Elasticsearch we need to suffix for string field
                }

                $query->addSort([
                    $field => [
                        'order' => $order
                    ]
                ]);
            }
        }

        return $query;
    }
}
