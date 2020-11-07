<?php

namespace Model;

/**
 * Class UserForSnip
 * @package Model
 */
class UserForSnip
{
    /**
     * @var int
     */
    private $idUser;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * UserForSnip constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

}