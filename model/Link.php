<?php

namespace Model;

class Link
{
    /**
     * @var int
     */
    private $idLink;
    /**
     * @var string
     */
    private $label;
    /**
     * @var string
     */
    private $adrOrFile;
    /**
     * @var int
     */
    private $idRub;
    /**
     * @var int
     */
    private $idType;

    /**
     * Link constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdLink()
    {
        return $this->idLink;
    }

    /**
     * @param int $idLink
     */
    public function setIdLink($idLink)
    {
        $this->idLink = $idLink;
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
     * @return string
     */
    public function getAdrOrFile()
    {
        return $this->adrOrFile;
    }

    /**
     * @param string $adrOrFile
     */
    public function setAdrOrFile($adrOrFile)
    {
        $this->adrOrFile = $adrOrFile;
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

}