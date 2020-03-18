<?php

namespace Manager;

use PDO;
use Model\Link;

/*
require_once ROOT_DIR . 'manager/Manager.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'model/Link.php';
*/

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
     * @return Link|null
     */
    public function findOne(int $id): ?Link
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM link WHERE idLink = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Link $link
     * @return Link|null
     */
    public function insert(Link $link): ?Link
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO link (idLink, label, adrOrFile, idRub, idType)
                            VALUES (idLink=:id, label=:label, adrOrFile=:adrOrFile, idRub=:idRub, idType=:idType'
            );
            if ($stmt->execute(
                [
                    ':id' => $link->getIdLink(),
                    ':label' => $link->getLabel(),
                    ':arOrFile' => $link->getAdrOrFile(),
                    ':idRub' => $link->getIdRub(),
                    ':idType' => $link->getIdType()
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
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('DELETE FROM link WHERE idLink = :id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Link $link
     * @return Link|null
     */
    public function update(Link $link): ?Link
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'UPDATE link
                            SET label=:label, adrOrFile=:adrOrFile, idRub=:idRub, idType=:idType
                            WHERE idLink=:id'
            );
            if ($stmt->execute(
                [
                    ':label' => $link->getLabel(),
                    ':arOrFile' => $link->getAdrOrFile(),
                    ':idRub' => $link->getIdRub(),
                    ':idType' => $link->getIdType(),
                    ':id' => $link->getIdLink()
                ]
            )) {
                return $this->findOne($link->getIdLink());
            }
            return null;
        } catch (PDOException $e) {
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
     * @param string $label
     * @return Link[]
     */
    public function findAllByIdRubAndIdType(int $idRub, string $label): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'SELECT l.* FROM link l
                            JOIN type t ON l.idType = t.idType
                            WHERE idRub = :idRub AND t.label = :label');
            $stmt->execute([':idRub' => $idRub, ':label' => $label]);
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
     * @param int $idRub
     * @param string[] $typeLabels
     * @return Link[]
     */
    public function findAllAsides(int $idRub, array $typeLabels): array
    {
        $links = [];
        foreach($typeLabels as $label)
            $links[$label] = $this->findAllByIdRubAndIdType($idRub, $label);
        return $links;
    }

    /**
     * @param string $labelRub
     * @param string $labelType
     * @return Link[]
     */
    public function findAllByLabelRubAndLabelType(string $labelRub, string $labelType): array
    {
        try {
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT l.* FROM link l
                JOIN rubric r ON l.idRub = r.idRub
                JOIN type t ON l.idType = t.idType
                WHERE r.label = :labelRub AND t.label = :labelType');
            $stmt->execute([':labelRub' => $labelRub, ':labelType' => $labelType]);
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
     * @param string $labelRub
     * @param string[] $typeLabels
     * @return Link[]
     */
    public function findAsidesByLabelRub(string $labelRub, array $typeLabels): array
    {
        $links = [];
        foreach($typeLabels as $labelType)
            $links[$labelType] = $this->findAllByLabelRubAndLabelType($labelRub, $labelType);
        return $links;
    }

}