<?php

namespace Manager;

use Model\Cat;
use PDO;

/**
 * Class CatManager
 * @package Manager
 */
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
     * @return Cat[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM cat');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Cat|null
     */
    public function findOne(int $id): ?Cat
    {
        $stmt = $this->db->prepare('SELECT * FROM cat WHERE idCat=:id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param int $id
     * @return Cat[]
     */
    public function CatsBySnip(int $id): array
    {
        $stmt = $this->db->prepare('SELECT c.* FROM cat c
            JOIN snipcat sc ON sc.idCat = c.idCat
            WHERE sc.idSnip = :id');
        $stmt->execute([':id' => $id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param Cat $cat
     * @return Cat|null
     */
    public function insert(Cat $cat): ?Cat
    {
        $stmt = $this->db->prepare('INSERT INTO cat (label) VALUES (:label)');
        if ($stmt->execute([':label' => htmlentities($cat->getLabel())])) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Cat $cat
     * @return Cat|null
     */
    public function update(Cat $cat): ?Cat
    {
        $stmt = $this->db->prepare('UPDATE cat SET label=:label WHERE idCat=:id');
        if ($stmt->execute([':label' => htmlentities($cat->getLabel()), ':id' => $cat->getIdCat()])) {
            return $this->findOne($cat->getIdCat());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM cat WHERE idCat=:id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}