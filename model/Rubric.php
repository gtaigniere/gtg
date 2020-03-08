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
     * Rubric constructor.
     * @param int $idRub
     * @param string $libelle
     */
    public function __construct($idRub, $libelle)
    {
        $this->idRub = $idRub;
        $this->libelle = $libelle;
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

}