<?php

namespace Model;

use DateTime;
use Exception;

/**
 * Class Message
 * @package Model
 */
class Message
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $object;

    /**
     * @var DateTime
     */
    private $received;

    /**
     * @var string
     */
    private $message;

    /**
     * Contact constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getObject(): string
    {
        return $this->object;
    }

    /**
     * @param string $object
     */
    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    /**
     * @return DateTime|null
     */
    public function getReceived(): ?DateTime
    {
        return $this->received;
    }

    /**
     * @param DateTime|string|null $received
     * @throws Exception
     */
    public function setReceived($received): void
    {
        if ($received instanceof DateTime) {
            $this->received;
        } elseif (is_string($received)) {
            $this->received = DateTime::createFromFormat('Y-m-d H:i:s', $received);
        } else {
            throw new Exception('Une date au format Datetime ou string doit être fournie !');
        }
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

}