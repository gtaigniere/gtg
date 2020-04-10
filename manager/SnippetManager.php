<?php

namespace Manager;

use Model\Snippet;
use PDO;
use PDOException;

class SnippetManager extends Manager
{
    /**
     * @var LanguageManager
     */
    private $languageManager;

    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @var CatManager
     */
    private $catManager;

    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        Parent::__construct(Snippet::class, $db);
        $this->languageManager = new LanguageManager($db);
        $this->userManager = new UserManager($db);
        $this->catManager = new CatManager($db);
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
            $stmt = $this->db->prepare('SELECT * FROM snippet WHERE idSnip = :id');
            $stmt->execute([':id' => $id]);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return Snippet|null
     */
    public function findLast(): ?Snippet
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->query('SELECT * FROM snippet ORDER BY idSnip DESC LIMIT 1');
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findByLang(int $id): ?array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT s.* FROM snippet s
                JOIN snipcat sc ON sc.idSnip = s.idSnip
                WHERE s.idLang = :id');
            $stmt->execute([':id' => $id]);
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
     * @return array|null
     */
    public function findLastByLang(int $id): ?array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT s.* FROM snippet s
                JOIN snipcat sc ON sc.idSnip = s.idSnip
                WHERE s.idLang = :id ORDER BY idSnip DESC LIMIT 1');
            $stmt->execute([':id' => $id]);
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
     * @return array|null
     */
    public function findByCat(int $id): ?array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT s.* FROM snippet s
                JOIN snipcat sc ON sc.idSnip = s.idSnip
                WHERE sc.idCat = :id');
            $stmt->execute([':id' => $id]);
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
     * @return array|null
     */
    public function findLastByCat(int $id): ?array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT s.* FROM snippet s
                JOIN snipcat sc ON sc.idSnip = s.idSnip
                WHERE sc.idCat = :id ORDER BY idSnip DESC LIMIT 1');
            $stmt->execute([':id' => $id]);
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
     * @param int $idLang
     * @param int $idCat
     * @return array|null
     */
    public function findByLangAndCat(int $idLang, int $idCat): ?array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT s.* FROM snippet s
                JOIN snipcat sc ON sc.idSnip = s.idSnip
                WHERE s.idLang = :idLang AND sc.idCat = :idCat');
            $stmt->execute([':idLang' => $idLang, ':idCat' => $idCat]);
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
     * @param int $idLang
     * @param int $idCat
     * @return array|null
     */
    public function findLastByLangAndCat(int $idLang, int $idCat): ?array
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare('SELECT s.* FROM snippet s
                JOIN snipcat sc ON sc.idSnip = s.idSnip
                WHERE s.idLang = :idLang AND sc.idCat = :idCat
                ORDER BY idSnip DESC LIMIT 1');
            $stmt->execute([':idLang' => $idLang, ':idCat' => $idCat]);
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
     * @param Snippet $snippet
     * @return Snippet|null
     */
    public function insert(Snippet $snippet): ?Snippet
    {
        try {
//            $this->db->exec("set names utf8");
            $stmt = $this->db->prepare(
                'INSERT INTO language (title, dateCrea, comment, requirement, idUser, idLang)
                            VALUES (:title, :dateCrea, :comment, :requirement, :idLang, :idUser)');
            if ($stmt->execute(
                [
                    ':title' => $snippet->getTitle(),
                    ':dateCrea' => $snippet->getDateCrea(),
                    ':comment' => $snippet->getComment(),
                    ':requirement' => $snippet->getRequirement(),
                    ':idLang' => $snippet->getLanguage() != null ? $snippet->getLanguage()->getIdLang() : null,
                    ':idUser' => $snippet->getIdUser()
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
                            SET title=:title, dateCrea=:dateCrea, comment=:comment, requirement=:requirement, idLang=:idLang, idUser=:idUser
                            WHERE idSnip=:id');
            if ($stmt->execute(
                [
                    ':title' => $snippet->getTitle(),
                    ':dateCrea' => $snippet->getDateCrea(),
                    ':comment' => $snippet->getComment(),
                    ':requirement' => $snippet->getRequirement(),
                    ':idLang' => $snippet->getLanguage() != null ? $snippet->getLanguage()->getIdLang() : null,
                    ':idUser' => $snippet->getIdUser(),
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

    protected function convInObjTest()
    {

    }

    /**
     * @param array $assocs
     * @param string $className
     * @return mixed
     */
    protected function convInObj(array $assocs, string $className = null)
    {
        $snippet = parent::convInObj($assocs, $className);
        $language = $assocs['idLang'] != null ? $this->languageManager->findOne($assocs['idLang']) : null;
        $snippet->setLanguage($language);
        $user = $this->userManager->findOneForSnippet($assocs['idUser']);
        $snippet->setUser($user);
        $cats = $this->catManager->CatsBySnip($assocs['idSnip']);
        $snippet->setCats($cats);
        return $snippet;
    }

}