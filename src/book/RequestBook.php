<?php

namespace mpstyle\request\book;

use mpstyle\request\entity\Filter;
use mpstyle\request\entity\OrderClause;
use mpstyle\request\entity\Pagination;
use mpstyle\request\entity\Request;
use mpstyle\request\exception\InvalidRequestException;
use mtoolkit\core\MObject;

class RequestBook extends MObject
{
    /**
     * @param string $postRequest
     * @return Request
     * @throws InvalidRequestException
     */
    public function trasform( $postRequest )
    {
        $request = new Request();
        $requestArray = json_encode( $postRequest );

        if( $requestArray === false )
        {
            throw new InvalidRequestException();
        }

        if( isset( $request['pagination'] ) )
        {
            $request->setPagination( $this->createPagination( $request['pagination'] ) );
        }

        if( isset( $request['filters'] ) )
        {
            $request->addAllFilters( $this->createFilters( $request['filters'] ) );
        }

        if( isset( $request['orderClauses'] ) )
        {
            $request->addAllOrderClauses( $this->createOrderClauses( $request['orderClauses'] ) );
        }

        return $request;
    }

    /**
     * @param array $paginationArray
     * @return Pagination
     */
    private function createPagination( array $paginationArray )
    {
        $pagination = new Pagination();

        if( isset( $paginationArray['page'] ) )
        {
            $pagination->setPage( $paginationArray['page'] );
        }

        if( isset( $paginationArray['pageSize'] ) )
        {
            $pagination->setPageSize( $paginationArray['pageSize'] );
        }

        return $pagination;
    }

    /**
     * @param array $filtersArray
     * @return \mpstyle\request\entity\Filter[]
     */
    private function createFilters( array $filtersArray )
    {
        /* @var $filters Filter[] */
        $filters = array();

        foreach( $filtersArray as $filterArray )
        {
            $filter = new Filter();

            if( isset( $filterArray["name"] ) && isset( $filterArray["value"] ) )
            {
                $filter->setName( $filterArray["name"] );
                $filter->setValue( $filterArray["value"] );

                if( isset( $filterArray["type"] ) )
                {
                    $filter->setType( $filterArray["type"] );
                }

                $filters[] = $filter;
            }
            else
            {
                $warningMessage = sprintf( "Invalid filter: %s", json_encode( $filterArray ) );
                trigger_error( $warningMessage, E_USER_WARNING );
            }
        }

        return $filters;
    }

    /**
     * @param array $orderClausesArray
     * @return \mpstyle\request\entity\OrderClause[]
     */
    private function createOrderClauses( array $orderClausesArray )
    {
        /* @var $orderClauses OrderClause[] */
        $orderClauses = array();

        foreach( $orderClausesArray as $orderClauseArray )
        {
            $orderClause = new OrderClause();

            if( isset( $orderClauseArray["name"] ) && isset( $orderClauseArray["value"] ) )
            {
                $orderClause->setFieldName( $orderClauseArray["fieldName"] );
                $orderClause->setOrderDirection( $orderClauseArray["orderDirection"] );

                $orderClauses[] = $orderClause;
            }
            else
            {
                $warningMessage = sprintf( "Invalid order clause: %s", json_encode( $orderClauseArray ) );
                trigger_error( $warningMessage, E_USER_WARNING );
            }
        }

        return $orderClauses;
    }
}