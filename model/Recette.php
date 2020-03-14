<?php


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
    private $pourCombien;

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
     * Type constructor.
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
     * @return string
     */
    public function getInfos(): string
    {
        return $this->infos;
    }

    /**
     * @param string $infos
     */
    public function setInfos(string $infos): void
    {
        $this->infos = $infos;
    }

    /**
     * @return int
     */
    public function getPourCombien(): int
    {
        return $this->pourCombien;
    }

    /**
     * @param int $pourCombien
     */
    public function setPourCombien(int $pourCombien): void
    {
        $this->pourCombien = $pourCombien;
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
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto(string $photo): void
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