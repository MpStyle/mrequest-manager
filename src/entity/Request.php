<?php

namespace mpstyle\request\entity;

class Request
{
    /**
     * @var Filter[]
     */
    private $filters=array();

    /**
     * @var Pagination
     */
    private $pagination=null;

    /**
     * @var OrderClause[]
     */
    private $orderClauses=array();

    /**
     * @return Filter[]
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param Filter $filter
     * @return Request
     */
    public function addFilter( Filter $filter )
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * @param Filter[] $filters
     * @return $this
     */
    public function addAllFilters( array $filters )
    {
        $this->filters = array_merge($filters, $this->filters);

        return $this;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param Pagination $pagination
     * @return Request
     */
    public function setPagination( $pagination )
    {
        $this->pagination = $pagination;

        return $this;
    }

    /**
     * @return OrderClause[]
     */
    public function getOrderClauses()
    {
        return $this->orderClauses;
    }

    /**
     * @param OrderClause $orderClause
     * @return Request
     */
    public function addOrderClause( OrderClause $orderClause )
    {
        $this->orderClauses[] = $orderClause;

        return $this;
    }

    /**
     * @param OrderClause[] $orderClauses
     * @return $this
     */
    public function addAllOrderClauses( array $orderClauses )
    {
        $this->orderClauses = array_merge($orderClauses, $this->orderClauses);

        return $this;
    }
}