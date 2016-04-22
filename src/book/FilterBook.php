<?php
namespace mpstyle\request\book;

use mpstyle\request\entity\Filter;

class FilterBook
{
    /**
     * @param array $filtersArray
     * @return \mpstyle\request\entity\Filter[]
     */
    public function transform( array $filtersArray )
    {
        /* @var $filters Filter[] */
        $filters = array();

        foreach( $filtersArray as $filterArray )
        {
            $filter = $this->getFilter( $filterArray );
            if( is_null( $filter ) === false )
            {
                $filters[] = $filter;
            }
        }

        return $filters;
    }

    /**
     * @param array $filterArray
     * @return Filter
     */
    private function getFilter( array $filterArray )
    {
        $filter = null;

        if( isset( $filterArray["name"] ) && isset( $filterArray["value"] ) )
        {
            $filter = new Filter();
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

        return $filter;
    }
}