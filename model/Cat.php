<?php

namespace Model;

/**
 * Class Cat
 * @package Model
 */
class Cat
{
    /**
     * @var int
     */
    private $idCat;

    /**
     * @var string
     */
    private $Label;

    /**
     * Cat constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdCat(): int
    {
        return $this->idCat;
    }

    /**
     * @param int $idCat
     */
    public function setIdCat(int $idCat): void
    {
        $this->idCat = $idCat;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->Label;
    }

    /**
     * @param string $Label
     */
    public function setLabel(string $Label): void
    {
        $this->Label = $Label;
    }

}