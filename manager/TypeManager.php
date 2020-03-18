<?php

namespace Manager;

use PDO;
use Model\type;

/*
require_once ROOT_DIR . 'manager/Manager.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'model/Type.php';
*/

class TypeManager extends Manager
{
    /**
     * TypeManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct('Type', $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM type');
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
     * @return Type|null
     */
    public function findOne(int $id): ?Type
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM type WHERE idType = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Type $type
     * @return Type|null
     */
    public function insert(Type $type): ?Type
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO type (idRub, label)
                            VALUES (idType=:id, label=:label');
            if ($stmt->execute([':id' => $type->getIdType(), ':label' => $type->getLabel()])) {
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
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('DELETE FROM type WHERE idType = :id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Type $type
     * @return Type|null
     */
    public function update(Type $type): ?Type
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('UPDATE type SET label=:label WHERE idType=:id');
            if ($stmt->execute([':label' => $type->getLabel(), ':id' => $type->getIdType()])) {
                return $this->findOne($type->getIdType());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}