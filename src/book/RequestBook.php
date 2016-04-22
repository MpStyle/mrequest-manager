<?php

namespace mpstyle\request\book;

use mpstyle\request\entity\Request;
use mpstyle\request\exception\InvalidRequestException;
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
     * @param string $postRequest
     * @return Request
     * @throws InvalidRequestException
     */
    public function transform( $postRequest )
    {
        $request = new Request();
        $requestArray = json_encode( $postRequest );

        if( $requestArray === false )
        {
            throw new InvalidRequestException();
        }

        if( isset( $request['pagination'] ) )
        {
            $request->setPagination( $this->paginationBook->transform( $request['pagination'] ) );
        }

        if( isset( $request['filters'] ) )
        {
            $request->addAllFilters( $this->filterBook->transform( $request['filters'] ) );
        }

        if( isset( $request['orderClauses'] ) )
        {
            $request->addAllOrderClauses( $this->orderClauseBook->transform( $request['orderClauses'] ) );
        }

        return $request;
    }
}