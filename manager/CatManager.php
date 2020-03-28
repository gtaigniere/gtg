<?php

namespace Manager;

use PDO;
use Model\Cat;
use PDOException;

class CatManager extends Manager
{
    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Cat::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM cat');
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
     * @return Cat|null
     */
    public function findOne(int $id): ?Cat
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM cat WHERE idCat=:id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Cat $cat
     * @return Cat|null
     */
    public function insert(Cat $cat): ?Cat
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('INSERT INTO cat (label) VALUES (:label)');
            if ($stmt->execute([':id' => $cat->getIdCat(), ':label' => $cat->getLabel()])) {
                $id = $this->db->lastInsertId();
                return $this->findOne($id);
            }
            return null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('DELETE FROM cat WHERE idCat=:id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Cat $cat
     * @return Cat|null
     */
    public function update(Cat $cat): ?Cat
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('UPDATE cat SET label=:label WHERE idCat=:id');
            if ($stmt->execute([':label' => $cat->getLabel(), ':id' => $cat->getIdCat()])) {
                return $this->findOne($cat->getIdCat());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}