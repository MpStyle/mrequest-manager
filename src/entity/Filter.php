<?php

namespace mpstyle\request\entity;

class Filter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Filter
     */
    public function setName( $name )
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Filter
     */
    public function setValue( $value )
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Use {@link FilterType}
     *
     * @param string $type
     * @return Filter
     */
    public function setType( $type )
    {
        $this->type = $type;

        return $this;
    }


}