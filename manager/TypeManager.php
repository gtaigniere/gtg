<?php

require_once 'config/MyPdo.php';
require_once 'model/Type.php';

class TypeManager
{
    /**
     * @var MyPdo
     */
    private $db;

    /**
     * TypeManager constructor.
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
        $stmt = $this->db->query('SELECT * FROM type');
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
        $stmt = $this->db->prepare('SELECT * FROM type WHERE idType = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}