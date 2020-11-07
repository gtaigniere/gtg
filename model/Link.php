<?php

namespace Model;

/**
 * Class Link
 * @package Model
 */
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
     * @var Rubric
     */
    private $rubric;

    /**
     * @var Type
     */
    private $type;

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
     * @return Rubric
     */
    public function getRubric()
    {
        return $this->rubric;
    }

    /**
     * @param Rubric $rubric
     */
    public function setRubric($rubric): void
    {
        $this->rubric = $rubric;
    }

    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

}