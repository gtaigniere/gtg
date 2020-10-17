<?php

namespace Manager;

use Model\Language;
use PDO;

/**
 * Class LanguageManager
 * @package Manager
 */
class LanguageManager extends Manager
{
    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Language::class, $db);
    }

    /**
     * @return Language[]
     */
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM language');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Language|null
     */
    public function findOne(int $id): ?Language
    {
        $stmt = $this->db->prepare('SELECT * FROM language WHERE idLang=:id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param Language $language
     * @return Language|null
     */
    public function insert(Language $language): ?Language
    {
        $stmt = $this->db->prepare('INSERT INTO language (label) VALUES (:label)');
        if ($stmt->execute([':label' => htmlentities($language->getLabel())])) {
            $id = $this->db->lastInsertId();
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Language $language
     * @return Language|null
     */
    public function update(Language $language): ?Language
    {
        $stmt = $this->db->prepare('UPDATE language SET label=:label WHERE idLang=:id');
        if ($stmt->execute([':label' => htmlentities($language->getLabel()), ':id' => $language->getIdLang()])) {
            return $this->findOne($language->getIdLang());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM language WHERE idLang=:id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

}