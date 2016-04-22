<?php

namespace mpstyle\mrequestmanager\book;

use mpstyle\mrequestmanager\entity\Request;
use mpstyle\mrequestmanager\exception\InvalidRequestException;
use mtoolkit\core\MObject;

class RequestBook extends MObject
{
    /**
     * @var FilterBook
     */
    private $filterBook = null;

    /**
     * @var OrderClauseBook
     */
    private $orderClauseBook = null;

    /**
     * @var PaginationBook
     */
    private $paginationBook = null;

    /**
     * RequestBook constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->filterBook = new FilterBook();
        $this->orderClauseBook = new OrderClauseBook();
        $this->paginationBook = new PaginationBook();
    }

    /**
     * @param array $postRequest
     * @return Request
     * @throws InvalidRequestException
     */
    public function transform( array $postRequest )
    {
        $request = new Request();

        if( isset( $postRequest['pagination'] ) )
        {
            $request->setPagination( $this->paginationBook->transform( $postRequest['pagination'] ) );
        }

        if( isset( $postRequest['filters'] ) )
        {
            $request->addAllFilters( $this->filterBook->transform( $postRequest['filters'] ) );
        }

        if( isset( $postRequest['orderClauses'] ) )
        {
            $request->addAllOrderClauses( $this->orderClauseBook->transform( $postRequest['orderClauses'] ) );
        }

        return $request;
    }
}