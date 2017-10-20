<?php

namespace App\Model;


class ApiQuery
{
    private $_sort = [];

    public function addSort($field, $order): ApiQuery
    {
        $this->_sort[$field] = $order;

        return $this;
    }

    public function getSort($field): ?string
    {
        return $this->_sort[$field] ?? null;
    }

    public function getSorts(): array
    {
        return $this->_sort;
    }
}