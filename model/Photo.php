<?php


class Photo
{
    /**
     * @var int
     */
    private $idPhoto;

    /**
     * @var string
     */
    private $label;

    /**
     * Type constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdPhoto(): int
    {
        return $this->idPhoto;
    }

    /**
     * @param int $idPhoto
     */
    public function setIdPhoto(int $idPhoto): void
    {
        $this->idPhoto = $idPhoto;
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