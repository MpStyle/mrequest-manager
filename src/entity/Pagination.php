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

use mtoolkit\core\MDataType;

class Pagination
{
    /**
     * @var integer
     */
    private $page;

    /**
     * @var integer
     */
    private $pageSize;

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return Pagination
     */
    public function setPage( $page )
    {
        MDataType::mustBe( MDataType::INT );
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     * @return Pagination
     */
    public function setPageSize( $pageSize )
    {
        MDataType::mustBe( MDataType::INT );
        $this->pageSize = $pageSize;

        return $this;
    }
}