<?php

namespace Model;

use DateTime;

class Snippet
{
    /**
     * @var int
     */
    private $idSnip;

    /**
     * @var string
     */
    private $title;

    /**
     * @var DateTime
     */
    private $dateCrea;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $requirement;

    /**
     * @var int
     */
    private $idUser;

    /**
     * @var int
     */
    private $idLang;

    /**
     * @return int
     */
    public function getIdSnip(): int
    {
        return $this->idSnip;
    }

    /**
     * @param int $idSnip
     */
    public function setIdSnip(int $idSnip): void
    {
        $this->idSnip = $idSnip;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return DateTime
     */
    public function getDateCrea(): DateTime
    {
        return $this->dateCrea;
    }

    /**
     * @param DateTime $dateCrea
     */
    public function setDateCrea(DateTime $dateCrea): void
    {
        $this->dateCrea = $dateCrea;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getRequirement(): string
    {
        return $this->requirement;
    }

    /**
     * @param string $requirement
     */
    public function setRequirement(string $requirement): void
    {
        $this->requirement = $requirement;
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

}