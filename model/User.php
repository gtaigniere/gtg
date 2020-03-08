<?php


class User
{
    /**
     * @var int
     */
    private $idUser;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $pwd;

    /**
     * User constructor.
     * @param int $idUser
     * @param string $lastname
     * @param string $firstname
     * @param string $email
     * @param string $pwd
     */
    public function __construct($idUser, $lastname, $firstname, $email, $pwd)
    {
        $this->idUser = $idUser;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

}