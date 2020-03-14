<?php

require_once ROOT_DIR . 'manager/Manager.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'model/Recette.php';

class RecetteManager extends Manager
{
    /**
     * RecetteManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct('Recette', $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
            $this->db->exec("set names utf8");
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
            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM recette WHERE idRec = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}