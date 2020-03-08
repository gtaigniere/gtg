<?php

require_once 'config/MyPdo.php';
require_once 'model/Link.php';

class LinkManager
{
    /**
     * @var MyPdo
     */
    private $db;

    /**
     * LinkManager constructor.
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
        $stmt = $this->db->query('SELECT * FROM link');
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
        $stmt = $this->db->prepare('SELECT * FROM link WHERE idLink = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $idRub
     * @return array
     */
    public function findAllByRubric(int $idRub)
    {
        try {
            $this->db;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $this->db->exec("set names utf8");
        $stmt = $this->db->prepare('SELECT * FROM link WHERE idRub = :id');
        $stmt->execute([':id' => $idRub]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}