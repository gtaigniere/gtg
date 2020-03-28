<?php

namespace Manager;

use PDO;
use Model\Language;
use PDOException;

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
     * @return array
     */
    public function findAll(): array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM language');
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
     * @return Language|null
     */
    public function findOne(int $id): ?Language
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM language WHERE idLang=:id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Language $language
     * @return Language|null
     */
    public function insert(Language $language): ?Language
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('INSERT INTO language (label) VALUES (:label)');
            if ($stmt->execute([':id' => $language->getIdLang(), ':label' => $language->getLabel()])) {
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
            $stmt = $this->db->prepare('DELETE FROM language WHERE idLang=:id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Language $language
     * @return Language|null
     */
    public function update(Language $language): ?Language
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('UPDATE language SET label=:label WHERE idLang=:id');
            if ($stmt->execute([':label' => $language->getLabel(), ':id' => $language->getIdLang()])) {
                return $this->findOne($language->getIdLang());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}