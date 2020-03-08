<?php

require_once 'config/MyPdo.php';
require_once 'model/User.php';

class UserManager
{
    /**
     * @var MyPdo
     */
    private $db;

    /**
     * UserManager constructor.
     * @param MyPdo $db
     */
    public function __construct(MyPdo $db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
            $this->db;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->exec("set names utf8");
        $stmt = $this->db->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return array
     */
    public function findOne(int $id): array
    {
        try {
            $this->db;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->exec("set names utf8");
        $stmt = $this->db->prepare('SELECT * FROM user WHERE idUser = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}