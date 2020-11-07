<?php

namespace Model;

/**
 * Class Type
 * @package Model
 */
class Type
{
    /**
     * @var int
     */
    private $idType;

    /**
     * @var string
     */
    private $label;

    /**
     * Type constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @param int $idType
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

}