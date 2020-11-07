<?php

namespace Manager;

use Model\Rubric;
use PDO;

/**
 * Class RubricManager
 * @package Manager
 */
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
     * @return Rubric[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM rubric');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Rubric|null
     */
    public function findOne(int $id): ?Rubric
    {
        $stmt = $this->db->prepare('SELECT * FROM rubric WHERE idRub = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param Rubric $rubric
     * @return Rubric|null
     */
    public function insert(Rubric $rubric): ?Rubric
    {
        $stmt = $this->db->prepare('INSERT INTO rubric (label, image) VALUES (:label, :image)');
        if ($stmt->execute([':label' => htmlentities($rubric->getLabel()), ':image' => htmlentities($rubric->getImage())])) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Rubric $rubric
     * @return Rubric|null
     */
    public function update(Rubric $rubric): ?Rubric
    {
        $stmt = $this->db->prepare('UPDATE rubric SET label=:label, image=:image WHERE idRub=:id');
        if ($stmt->execute([':label' => htmlentities($rubric->getLabel()), ':image' => htmlentities($rubric->getImage()), ':id' => $rubric->getIdRub()])) {
            return $this->findOne($rubric->getIdRub());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM rubric WHERE idRub = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}