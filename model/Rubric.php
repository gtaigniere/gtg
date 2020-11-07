<?php

namespace Model;

/**
 * Class Rubric
 * @package Model
 */
class Rubric
{
    /**
     * @var int
     */
    private $idRub;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $image;

    /**
     * Rubric constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdRub()
    {
        return $this->idRub;
    }

    /**
     * @param int $idRub
     */
    public function setIdRub($idRub)
    {
        $this->idRub = $idRub;
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

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

}