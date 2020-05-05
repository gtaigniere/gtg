<?php

namespace Manager;

use DateTime;
use Html\Form;
use Exception;
use Model\Cat;
use Model\Snippet;
use PDO;
use Service\AuthService;

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
        $stmt = $this->db->query('SELECT * FROM snippet');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param int $id
     * @return Snippet|null
     */
    public function findOne(int $id): ?Snippet
    {
        $stmt = $this->db->prepare('SELECT * FROM snippet WHERE idSnip = :id');
        $stmt->execute([':id' => $id]);
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @return Snippet|null
     */
    public function findLast(): ?Snippet
    {
        $stmt = $this->db->query('SELECT * FROM snippet ORDER BY idSnip DESC LIMIT 1');
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findByLang(int $id): ?array
    {
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
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findLastByLang(int $id): ?array
    {
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
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findByCat(int $id): ?array
    {
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
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findLastByCat(int $id): ?array
    {
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
    }

    /**
     * @param int $idLang
     * @param int $idCat
     * @return array|null
     */
    public function findByLangAndCat(int $idLang, int $idCat): ?array
    {
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
    }

    /**
     * @param int $idLang
     * @param int $idCat
     * @return array|null
     */
    public function findLastByLangAndCat(int $idLang, int $idCat): ?array
    {
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
    }

    /**
     *
     * @param Snippet $snippet
     * @return Snippet|null
     * @throws Exception
     */
    public function insert(Snippet $snippet): ?Snippet
    {
        $stmt = $this->db->prepare(
            'INSERT INTO snippet (title, code, dateCrea, comment, requirement, idLang, idUser)
                        VALUES (:title, :code, :dateCrea, :comment, :requirement, :idLang, :idUser)');
        if ($stmt->execute(
            [
                ':title' => $snippet->getTitle(),
                ':code' => $snippet->getCode(),
                ':dateCrea' => (new DateTime())->format('Y-m-d H:i:s'),
                ':comment' => $snippet->getComment() != null ? $snippet->getComment() : null,
                ':requirement' => $snippet->getRequirement() != null ? $snippet->getRequirement() : null,
                ':idLang' => $snippet->getLanguage() != null ? $snippet->getLanguage()->getIdLang() : null,
                ':idUser' => $snippet->getUser()->getIdUser()
            ]
        )) {
            $id = $this->db->lastInsertId();
            $cats = $snippet->getCats();
            foreach ($cats as $cat) {
                $this->addCatForSnip($id, $cat->getIdCat());
            }
            return $this->findOne($id);
        }
        return null;
    }

    /**
     * @param Snippet $snippet
     * @return Snippet|null
     */
    public function update(Snippet $snippet): ?Snippet
    {
        $oldSnippet = $this->findOne($snippet->getIdSnip());
        $stmt = $this->db->prepare(
            'UPDATE snippet
                        SET title=:title, code=:code, dateCrea=:dateCrea, comment=:comment, requirement=:requirement, idLang=:idLang, idUser=:idUser
                        WHERE idSnip=:id');
        if ($stmt->execute(
            [
                ':title' => $snippet->getTitle(),
                ':code' => $snippet->getCode(),
                ':dateCrea' => $snippet->getDateCrea()->format('Y-m-d H:i:s'),
                ':comment' => $snippet->getComment() != null ? $snippet->getComment() : null,
                ':requirement' => $snippet->getRequirement() != null ? $snippet->getRequirement() : null,
                ':idLang' => $snippet->getLanguage() != null ? $snippet->getLanguage()->getIdLang() : null,
                ':idUser' => $snippet->getUser()->getIdUser(),
                ':id' => $snippet->getIdSnip()
            ]
        )) {
            $id = $snippet->getIdSnip();
            $idOldCats = array_map(function(Cat $cat) {
                    return $cat->getIdCat();
            }, $oldSnippet->getCats());
//            $this->supCatsForSnip($id);
            $idNewCats = array_map(function(Cat $cat) {
                return $cat->getIdCat();
            }, $snippet->getCats());
            $toDels = array_diff($idOldCats, $idNewCats);
            foreach ($toDels as $toDel) {
                $this->supCatForSnip($id, $toDel);
            }
            $toAdds = array_diff($idNewCats, $idOldCats);
            foreach ($toAdds as $toAdd) {
                $this->addCatForSnip($id, $toAdd);
            }
            return $this->findOne($snippet->getIdSnip());
        }
        return null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM snippet WHERE idSnip=:id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

    /**
     * @param int $idSnip
     * @param int $idCat
     * @return int
     */
    public function addCatForSnip(int $idSnip, int $idCat): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO snipcat (idSnip, idCat)
                        VALUES (:idSnip, :idCat)');
        $stmt->execute([':idSnip' => $idSnip, ':idCat' => $idCat]);
        return $stmt->rowCount();
    }

    /**
     * @param int $idSnip
     * @param int $idCat
     * @return int
     */
    public function supCatForSnip(int $idSnip, int $idCat): int
    {
        $stmt = $this->db->prepare('DELETE FROM snipcat WHERE idSnip=:idSnip AND idCat=:idCat');
        $stmt->execute([':idSnip' => $idSnip, ':idCat' => $idCat]);
        return $stmt->rowCount() > 0;
    }

    /**
     * @param int $id
     * @return int
     */
    public function supCatsForSnip(int $id): int
    {
        $stmt = $this->db->prepare('DELETE FROM snipcat WHERE idSnip=:id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
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

    /**
     * @param string $chaine
     * @param array $idLangs
     * @param array $idCats
     * @return array|null
     */
    public function research(string $chaine, array $idLangs, array $idCats): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT s.* FROM snippet s
            JOIN snipcat sc ON sc.idSnip = s.idSnip
            WHERE (s.code = :chaine OR s.comment = :chaine OR s.requirement = :chaine) 
            AND (s.idLang = :idLang( OR s.idLang = :idLang)( OR s.idLang = :idLang))
            AND (sc.idCat = :idCat( AND sc.idCat = :$idCat)( AND sc.idCat = :idCat))');
        $stmt->bindParam(':idLang1' => $idLang1);
        $stmt->bindParam(':idLang2' => $idLang2);
        $stmt->bindParam(':idLang3' => $idLang3);
        $stmt->bindParam(':idCat1' => $idCat1);
        $stmt->bindParam(':idCat2' => $idCat2);
        $stmt->bindParam(':idCat3' => $idCat3);
        $stmt->bindParam(':chaine' => $chaine);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

    /**
     * @param array $request
     * @return array|null
     */
    public function findFirst(array $request): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT s.* FROM snippet s
            JOIN snipcat sc ON sc.idSnip = s.idSnip
            WHERE (s.code = :chaine OR s.comment = :chaine OR s.requirement = :chaine) 
            AND (s.idLang = :idLang( OR s.idLang = :idLang)( OR s.idLang = :idLang))
            AND (sc.idCat = :idCat( AND sc.idCat = :$idCat)( AND sc.idCat = :idCat))
            ORDER BY s.idSnip ASC LIMIT 1');
        $stmt->bindParam(':idLang1' => $idLang1);
        $stmt->bindParam(':idLang2' => $idLang2);
        $stmt->bindParam(':idLang3' => $idLang3);
        $stmt->bindParam(':idCat1' => $idCat1);
        $stmt->bindParam(':idCat2' => $idCat2);
        $stmt->bindParam(':idCat3' => $idCat3);
        $stmt->bindParam(':chaine' => $chaine);
        $stmt->execute();
        $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $assocs ? $this->convInObj($assocs) : null;
    }

}