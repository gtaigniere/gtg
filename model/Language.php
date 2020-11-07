<?php

namespace Model;

/**
 * Class Language
 * @package Model
 */
class Language
{
    /**
     * @var int
     */
    private $idLang;

    /**
     * @var string
     */
    private $label;

    /**
     * Language constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return int
     */
    public function getIdLang(): int
    {
        return $this->idLang;
    }

    /**
     * @param int $idLang
     */
    public function setIdLang(int $idLang): void
    {
        $this->idLang = $idLang;
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

}