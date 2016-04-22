<?php

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