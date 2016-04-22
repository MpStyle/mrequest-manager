<?php

namespace mpstyle\request\entity;

class OrderClause
{
    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var string
     */
    private $orderDirection;

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param string $fieldName
     * @return OrderClause
     */
    public function setFieldName( $fieldName )
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDirection()
    {
        return $this->orderDirection;
    }

    /**
     * Use {@link OrderClause}
     *
     * @param string $orderDirection
     * @return OrderClause
     */
    public function setOrderDirection( $orderDirection )
    {
        $this->orderDirection = $orderDirection;

        return $this;
    }


}