<?php

namespace Manager;

use Model\type;
use PDO;

/**
 * Class TypeManager
 * @package Manager
 */
class TypeManager extends Manager
{

    /**
     * TypeManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Type::class, $db);
    }

    /**
     * @return Type[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM type');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Type|null
     */
    public function findOne(int $id): ?Type
    {
        $stmt = $this->db->prepare('SELECT * FROM type WHERE idType = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param Type $type
     * @return Type|null
     */
    public function insert(Type $type): ?Type
    {;
        $stmt = $this->db->prepare('INSERT INTO type (label) VALUES (:label)');
        if ($stmt->execute([':label' => htmlentities($type->getLabel())])) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Type $type
     * @return Type|null
     */
    public function update(Type $type): ?Type
    {
        $stmt = $this->db->prepare('UPDATE type SET label=:label WHERE idType=:id');
        if ($stmt->execute([':label' => htmlentities($type->getLabel()), ':id' => $type->getIdType()])) {
            return $this->findOne($type->getIdType());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM type WHERE idType = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}