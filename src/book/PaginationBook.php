<?php

namespace mpstyle\request\book;

use mpstyle\request\entity\Pagination;

class PaginationBook
{
    /**
     * @param array $paginationArray
     * @return Pagination
     */
    public function transform( array $paginationArray )
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
}