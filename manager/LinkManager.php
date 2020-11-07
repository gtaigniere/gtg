<?php

namespace Manager;

use Model\Link;
use PDO;

/**
 * Class LinkManager
 * @package Manager
 */
class LinkManager extends Manager
{
    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * LinkManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        Parent::__construct(Link::class, $db);
        $this->rubricManager = new RubricManager($db);
        $this->typeManager = new TypeManager($db);
    }

    /**
     * @return Link[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM link');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Link|null
     */
    public function findOne(int $id): ?Link
    {
        $stmt = $this->db->prepare('SELECT * FROM link WHERE idLink = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param Link $link
     * @return Link|null
     */
    public function insert(Link $link): ?Link
    {
        $stmt = $this->db->prepare(
            'INSERT INTO link (label, adrOrFile, idRub, idType)
                        VALUES (:label, :adrOrFile, :idRub, :idType)'
        );
        if ($stmt->execute(
            [
                ':label' => htmlentities($link->getLabel()),
                ':adrOrFile' => htmlentities($link->getAdrOrFile()),
                ':idRub' => $link->getRubric() != null ? $link->getRubric()->getIdRub() : null,
                ':idType' => $link->getType() != null ? $link->getType()->getIdType() : null
            ]
        )) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Link $link
     * @return Link|null
     */
    public function update(Link $link): ?Link
    {
        $stmt = $this->db->prepare(
            'UPDATE link
                        SET label=:label, adrOrFile=:adrOrFile, idRub=:idRub, idType=:idType
                        WHERE idLink=:id'
        );
        if ($stmt->execute(
            [
                ':label' => htmlentities($link->getLabel()),
                ':adrOrFile' => htmlentities($link->getAdrOrFile()),
                ':idRub' => $link->getRubric() != null ? $link->getRubric()->getIdRub() : null,
                ':idType' => $link->getType() != null ? $link->getType()->getIdType() : null,
                ':id' => $link->getIdLink()
            ]
        )) {
            return $this->findOne($link->getIdLink());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM link WHERE idLink = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

    /**
     * @param int $idRub
     * @return Link[]
     */
    public function findAllByRubric(int $idRub): array
    {
        $stmt = $this->db->prepare('SELECT * FROM link WHERE idRub = :id');
        $stmt->execute([':id' => $idRub]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->convInObj($assocs);
    }

    /**
     * @param int $idType
     * @return Link[]
     */
    public function findAllByType(int $idType): array
    {
        $stmt = $this->db->prepare('SELECT * FROM link WHERE idType = :id');
        $stmt->execute([':id' => $idType]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->convInObj($assocs);
    }

    /**
     * @param int $idRub
     * @param string $label
     * @return Link[]
     */
    public function findAllByIdRubAndIdType(int $idRub, string $label): array
    {
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

    /**
     * @param array $assocs
     * @return mixed
     */
    protected function convInObj(array $assocs)
    {
        $link = parent::convInObj($assocs);
        $rubric = ($assocs['idRub'] != null) ? $this->rubricManager->findOne($assocs['idRub']) : null;
        $type = ($assocs['idType'] != null) ? $this->typeManager->findOne($assocs['idType']) : null;
        $link->setRubric($rubric);
        $link->setType($type);
        return $link;
    }

}