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
     * @var string
     */
    private $code;

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
     * @var Language|null
     */
    private $language;

    /**
     * @var UserForSnip
     */
    private $user;

    /**
     * @var Cat[]
     */
    private $cats = [];

    /**
     * Snippet constructor.
     */
    public function __construct()
    {
    }

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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return DateTime
     */
    public function getDateCrea(): DateTime
    {
        return $this->dateCrea;
    }

    /**
     * @param string $dateCrea
     */
    public function setDateCrea(string $dateCrea): void
    {
        $this->dateCrea = DateTime::createFromFormat('Y-m-d H:i:s', $dateCrea);
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getRequirement(): ?string
    {
        return $this->requirement;
    }

    /**
     * @param string $requirement
     */
    public function setRequirement(?string $requirement): void
    {
        $this->requirement = $requirement;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @param Language|null $language
     */
    public function setLanguage(?Language $language): void
    {
        $this->language = $language;
    }

    /**
     * @return UserForSnip
     */
    public function getUser(): UserForSnip
    {
        return $this->user;
    }

    /**
     * @param UserForSnip $user
     */
    public function setUser(UserForSnip $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Cat[]
     */
    public function getCats(): array
    {
        return $this->cats;
    }

    /**
     * @param Cat[] $cats
     */
    public function setCats(array $cats): void
    {
        $this->cats = $cats;
    }

}