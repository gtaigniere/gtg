<?php

namespace Model;

/**
 * Class Recette
 * @package Model
 */
class Recette
{
    /**
     * @var int
     */
    private $idRec;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $infos;

    /**
     * @var int
     */
    private $pour;

    /**
     * @var string
     */
    private $ingredient;

    /**
     * @var string
     */
    private $photo;

    /**
     * @var string
     */
    private $detail;

    /**
     * Recette constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdRec(): int
    {
        return $this->idRec;
    }

    /**
     * @param int $idRec
     */
    public function setIdRec(int $idRec): void
    {
        $this->idRec = $idRec;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getInfos(): ?string
    {
        return $this->infos;
    }

    /**
     * @param string|null $infos
     */
    public function setInfos(?string $infos): void
    {
        $this->infos = $infos;
    }

    /**
     * @return int
     */
    public function getPour(): int
    {
        return $this->pour;
    }

    /**
     * @param int $pour
     */
    public function setPour(int $pour): void
    {
        $this->pour = $pour;
    }

    /**
     * @return string
     */
    public function getIngredient(): string
    {
        return $this->ingredient;
    }

    /**
     * @param string $ingredient
     */
    public function setIngredient(string $ingredient): void
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param string|null $photo
     */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * @param string $detail
     */
    public function setDetail(string $detail): void
    {
        $this->detail = $detail;
    }

}