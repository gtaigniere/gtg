<?php

namespace Manager;

use PDO;
use Model\Photo;
use PDOException;

class PhotoManager extends Manager
{
    const CHEMIN = ROOT_DIR . 'imgs/galerie/';
    const FILES_EXT = ['jpg', 'png'];

    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Photo::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return array_map( // F:\PHP(Perso)\gtg\imgs/galerie/photo1-mini.jpg
            function(string $photo) {
                return str_replace('F:\\PHP(Perso)\\gtg\\', '', $photo );
            }, glob(self::CHEMIN . '*.{' . join(',', self::FILES_EXT) . '}', GLOB_BRACE)
        );
    }

    /**
     * @param int $id
     * @return Photo|null
     */
    public function findOne(int $id): ?Photo
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM photo WHERE idPhoto = :id');
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
            $stmt = $this->db->prepare('INSERT INTO photo (label) VALUES (:label)');
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