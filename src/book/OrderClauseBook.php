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

use mpstyle\mrequestmanager\entity\OrderClause;

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

            if( isset( $orderClauseArray["fieldName"] ) && isset( $orderClauseArray["orderDirection"] ) )
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