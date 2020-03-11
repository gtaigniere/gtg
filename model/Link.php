<?php


class Link
{
    /**
     * @var int
     */
    private $idLink;
    /**
     * @var string
     */
    private $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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