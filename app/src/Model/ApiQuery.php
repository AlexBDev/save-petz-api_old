<?php

namespace App\Model;


class ApiQuery
{
    private $_id = null;
    private $_limit = null;
    private $_offset = null;
    private $_data = [];
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

    public function pushData(array $data): ApiQuery
    {
        array_push($this->_data, $data);

        return $this;
    }

    public function getData(): array
    {
        return $this->_data;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->_id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->_limit;
    }

    /**
     * @param int $limit
     * @return ApiQuery
     */
    public function setLimit(int $limit): ApiQuery
    {
        $this->_limit = $limit;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getOffset(): ?int
    {
        return $this->_offset;
    }

    /**
     * @param int $offset
     * @return ApiQuery
     */
    public function setOffset(int $offset): ApiQuery
    {
        $this->_offset = $offset;
        return $this;
    }
}