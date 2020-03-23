<?php

namespace Manager;

use PDO;
use Model\Recette;
use PDOException;

class RecetteManager extends Manager
{
    /**
     * RecetteManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Recette::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM recette');
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
     * @return Recette|null
     */
    public function findOne(int $id): ?Recette
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM recette WHERE idRec = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Recette $recette
     * @return Recette|null
     */
    public function insert(Recette $recette): ?Recette
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO recette (id, label, infos, pour, ingredient, photo, detail)
                            VALUES (idRec=:id, label=:label, infos=:infos, pour=:pour, ingredient=:ingredient, photo=:photo, detail=:detail'
            );
            if ($stmt->execute(
                [
                    ':id' => $recette->getIdRec(),
                    ':label' => $recette->getLabel(),
                    ':infos' => $recette->getInfos(),
                    ':pour' => $recette->getPour(),
                    ':ingredient' => $recette->getIngredient(),
                    ':photo' => $recette->getPhoto(),
                    ':detail' => $recette->getDetail()
                ]
            )) {
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
            $stmt = $this->db->prepare('DELETE FROM recette WHERE idRec = :id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Recette $recette
     * @return Recette|null
     */
    public function update(Recette $recette): ?Recette
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'UPDATE recette
                            SET label=:label, infos=:infos, pour=:pour, ingredient=:ingredient, photo=:photo, detail=:detail
                            WHERE idRec=:id');
            if ($stmt->execute(
                [
                    ':label' => $recette->getLabel(),
                    ':infos' => $recette->getInfos(),
                    ':pour' => $recette->getPour(),
                    ':ingredient' => $recette->getIngredient(),
                    ':photo' => $recette->getPhoto(),
                    ':detail' => $recette->getDetail(),
                    ':idRec' => $recette->getIdRec()
                ]
            )) {
                return $this->findOne($recette->getIdRec());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}