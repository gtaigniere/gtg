<?php

namespace Manager;

use PDO;
use Model\Photo;
use PDOException;

class PhotoManager extends Manager
{
    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct('Model\Photo', $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM photo');
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
     * @return Photo|null
     */
    public function findOne(int $id): ?Photo
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM type WHERE idPhoto = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Photo $photo
     * @return Photo|null
     */
    public function insert(Photo $photo): ?Photo
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO photo (idPhoto, label)
                            VALUES (idPhoto=:id, label=:label');
            if ($stmt->execute([':id' => $photo->getIdPhoto(), ':label' => $photo->getLabel()])) {
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
            $stmt = $this->db->prepare('DELETE FROM photo WHERE idPhoto = :id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Photo $photo
     * @return Photo|null
     */
    public function update(Photo $photo): ?Photo
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('UPDATE photo SET label=:label WHERE idPhoto=:id');
            if ($stmt->execute([':label' => $photo->getLabel(), ':id' => $photo->getIdPhoto()])) {
                return $this->findOne($photo->getIdPhoto());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}