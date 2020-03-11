<?php

require_once ROOT_DIR . 'manager/Manager.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'model/Link.php';

class LinkManager extends Manager
{
    /**
     * LinkManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        Parent::__construct('Link', $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM link');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $objs = [];
            foreach ($results as $assocs) {
                $objs[] = $this->convInObj($assocs);
            }
            return $objs;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function findOne(int $id): Link
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM link WHERE idLink = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $this->convInObj($assocs);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $idRub
     * @return array
     */
    public function findAllByRubric(int $idRub): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM link WHERE idRub = :id');
            $stmt->execute([':id' => $idRub]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $this->convInObj($assocs);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $idRub
     * @return array
     */
    public function findAllByType(int $idType): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM link WHERE idType = :id');
            $stmt->execute([':id' => $idType]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $this->convInObj($assocs);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $idRub
     * @param int $idType
     * @return array
     */
    public function findAllByRubricAndType(int $idRub, int $idType): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM link WHERE idRub = :idRub AND idType = :idType');
            $stmt->execute([':idRub' => $idRub, ':idType' => $idType]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $this->convInObj($assocs);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}