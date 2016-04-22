<?php
namespace mpstyle\mrequestmanager\book;

use mpstyle\mrequestmanager\entity\Filter;
use mpstyle\mrequestmanager\entity\FilterType;

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

        if( isset( $filterArray["name"] ) )
        {
            $filter = new Filter();
            $filter->setName( $filterArray["name"] );
            $filter->setValue( isset( $filterArray["value"] ) ? $filterArray["value"] : null );

            if( isset( $filterArray["type"] ) )
            {
                $filter->setType( $filterArray["type"] );
            }
            else
            {
                $filter->setType( $this->getType( $filterArray["value"] ) );
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

    /**
     * @param mixed $value
     * @return null|string
     */
    private function getType( $value )
    {
        if( is_bool( $value ) )
        {
            return FilterType::BOOLEAN;
        }

        if( is_numeric( $value ) )
        {
            return FilterType::NUMBER;
        }

        if( is_array( $value ) )
        {
            return FilterType::_ARRAY;
        }

        if( is_string( $value ) )
        {
            return FilterType::STRING;
        }

        if( is_object( $value ) )
        {
            return FilterType::OBJECT;
        }

        return null;
    }
}