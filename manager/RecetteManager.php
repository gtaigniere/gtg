<?php

namespace Manager;

use Model\Recette;
use PDO;

/**
 * Class RecetteManager
 * @package Manager
 */
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
     * @return Recette[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM recette');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Recette|null
     */
    public function findOne(int $id): ?Recette
    {
        $stmt = $this->db->prepare('SELECT * FROM recette WHERE idRec = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param Recette $recette
     * @return Recette|null
     */
    public function insert(Recette $recette): ?Recette
    {
        $stmt = $this->db->prepare(
            'INSERT INTO recette (label, infos, pour, ingredient, photo, detail)
                        VALUES (:label, :infos, :pour, :ingredient, :photo, :detail)'
        );
        if ($stmt->execute(
            [
                ':label' => htmlentities($recette->getLabel()),
                ':infos' => htmlentities($recette->getInfos()),
                ':pour' => htmlentities($recette->getPour()),
                ':ingredient' => htmlentities($recette->getIngredient()),
                ':photo' => htmlentities($recette->getPhoto()),
                ':detail' => htmlentities($recette->getDetail())
            ]
        )) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Recette $recette
     * @return Recette|null
     */
    public function update(Recette $recette): ?Recette
    {
        $stmt = $this->db->prepare(
            'UPDATE recette
                        SET label=:label, infos=:infos, pour=:pour, ingredient=:ingredient, photo=:photo, detail=:detail
                        WHERE idRec=:id'
        );
        if ($stmt->execute(
            [
                ':label' => htmlentities($recette->getLabel()),
                ':infos' => htmlentities($recette->getInfos()),
                ':pour' => htmlentities($recette->getPour()),
                ':ingredient' => htmlentities($recette->getIngredient()),
                ':photo' => htmlentities($recette->getPhoto()),
                ':detail' => htmlentities($recette->getDetail()),
                ':id' => $recette->getIdRec()
            ]
        )) {
            return $this->findOne($recette->getIdRec());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM recette WHERE idRec = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}