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