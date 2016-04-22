<?php

/*
 * This file is part of mrequest-manager.
 *
 * mrequest-manager is free software: you can redistribute it and/or modify
 * it under the terms of the LGNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * mrequest-manager is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * LGNU Lesser General Public License for more details.
 *
 * You should have received a copy of the LGNU Lesser General Public License
 * along with mrequest-manager.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author  Michele Pagnin
 */

namespace mpstyle\mrequestmanager\entity;

class Request
{
    /**
     * @var Filter[]
     */
    private $filters = array();

    /**
     * @var Pagination
     */
    private $pagination = null;

    /**
     * @var OrderClause[]
     */
    private $orderClauses = array();

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
        $this->filters = array_merge( $filters, $this->filters );

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
        $this->orderClauses = array_merge( $orderClauses, $this->orderClauses );

        return $this;
    }
}