<?php


class Rubric
{
    /**
     * @var int
     */
    private $idRub;
    /**
     * @var string
     */
    private $libelle;

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

}