<?php

namespace mpstyle\request\book;

use mpstyle\request\entity\OrderClause;

class OrderClauseBook
{
    /**
     * @param array $orderClausesArray
     * @return OrderClause[]
     */
    public function transform( array $orderClausesArray )
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