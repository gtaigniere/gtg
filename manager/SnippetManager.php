<?php

namespace Manager;

use PDO;
use Model\Snippet;
use PDOException;

class SnippetManager extends Manager
{
    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Snippet::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM snippet');
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
     * @return Snippet|null
     */
    public function findOne(int $id): ?Snippet
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT * FROM snippet WHERE idSnip=:id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Snippet $snippet
     * @return Snippet|null
     */
    public function insert(Snippet $snippet): ?Snippet
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO language (title, dateCrea, comment, requirement, idUser, idLang)
                            VALUES (:title, :dateCrea, :comment, :requirement, :idUser, :idLang)');
            if ($stmt->execute(
                [
                    ':id' => $snippet->getIdSnip(),
                    ':title' => $snippet->getTitle(),
                    ':dateCrea' => $snippet->getDateCrea(),
                    ':comment' => $snippet->getComment(),
                    ':requirement' => $snippet->getRequirement(),
                    ':idUser' => $snippet->getIdUser(),
                    ':idLang' => $snippet->getIdLang(),
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
            $stmt = $this->db->prepare('DELETE FROM snippet WHERE idSnip=:id');
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Snippet $snippet
     * @return Snippet|null
     */
    public function update(Snippet $snippet): ?Snippet
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'UPDATE snippet
                            SET title=:title, dateCrea=:dateCrea, comment=:comment, requirement=:requirement, idUser=:idUser, idLang=:idLang
                            WHERE idSnip=:id');
            if ($stmt->execute(
                [
                    ':title' => $snippet->getTitle(),
                    ':dateCrea' => $snippet->getDateCrea(),
                    ':comment' => $snippet->getComment(),
                    ':requirement' => $snippet->getRequirement(),
                    ':idUser' => $snippet->getIdUser(),
                    ':idLang' => $snippet->getIdLang(),
                    ':id' => $snippet->getIdSnip()
                ]
            )) {
                return $this->findOne($snippet->getIdLang());
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}