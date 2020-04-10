<?php

namespace Manager;

use Model\Rubric;
use PDO;
use PDOException;

class RubricManager extends Manager
{

    /**
     * RubricManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Rubric::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM rubric');
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
     * @return Rubric|null
     */
    public function findOne(int $id): ?Rubric
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM rubric WHERE idRub = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Rubric $rubric
     * @return Rubric|null
     */
    public function insert(Rubric $rubric): ?Rubric
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('INSERT INTO rubric (label, image) VALUES (:label, :image)');
            if ($stmt->execute([':label' => $rubric->getLabel(), ':image' => $rubric->getImage()])) {
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
            $stmt = $this->db->prepare('DELETE FROM rubric WHERE idRub = :id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Rubric $rubric
     * @return Rubric|null
     */
    public function update(Rubric $rubric): ?Rubric
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('UPDATE rubric SET label=:label, image=:image WHERE idRub=:id');
            if ($stmt->execute([':label' => $rubric->getLabel(), ':image' => $rubric->getImage(), ':id' => $rubric->getIdRub()])) {
                return $this->findOne($rubric->getIdRub());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}