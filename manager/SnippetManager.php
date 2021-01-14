<?php

namespace Manager;

use DateTime;
use Form\SearchForm;
use Exception;
use Model\{
    Cat,
    Snippet
};
use PDO;

/**
 * Class SnippetManager
 * @package Manager
 */
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
     * SnippetManager constructor.
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
     * @return Snippet[]
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
     * @return Snippet[]|null
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
     * @return Snippet[]|null
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
     * @return Snippet[]|null
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
     * @return Snippet[]|null
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
     * @return Snippet[]|null
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
     * @return Snippet[]|null
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
                ':title' => htmlentities($snippet->getTitle()),
                ':code' => htmlentities($snippet->getCode()),
                ':dateCrea' => (new DateTime())->format('Y-m-d H:i:s'),
                ':comment' => $snippet->getComment() != null ? htmlentities($snippet->getComment()) : null,
                ':requirement' => $snippet->getRequirement() != null ? htmlentities($snippet->getRequirement()) : null,
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
                ':title' => htmlentities($snippet->getTitle()),
                ':code' => htmlentities($snippet->getCode()),
                ':dateCrea' => $snippet->getDateCrea()->format('Y-m-d H:i:s'),
                ':comment' => $snippet->getComment() != null ? htmlentities($snippet->getComment()) : null,
                ':requirement' => $snippet->getRequirement() != null ? htmlentities($snippet->getRequirement()) : null,
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
     * @return mixed
     */
    protected function convInObj(array $assocs)
    {
        $snippet = parent::convInObj($assocs);
        $language = $assocs['idLang'] != null ? $this->languageManager->findOne($assocs['idLang']) : null;
        $snippet->setLanguage($language);
        $user = $this->userManager->findOneForSnippet($assocs['idUser']);
        $snippet->setUser($user);
        $cats = $this->catManager->CatsBySnip($assocs['idSnip']);
        $snippet->setCats($cats);
        return $snippet;
    }

    /**
     * Création de la requète de recherche
     * @param string $chaine Chaine de caractères recherchée dans les champs
     * code, comment, et requirement de la table snippet
     * @param int[] $idLangs Tableau contenant les différents ids des langages recherchés
     * @param int[] $idCats Tableau contenant les différents ids des catégories recherchées
     * @return string
     */
    private function createRequest(string $chaine, array $idLangs, array $idCats): string
    {
        $wheres = [];
        $req = 'SELECT s0.* FROM snippet s0 ';
        if (!empty($idCats)) {
            // Cas 1 : Uniquement 'Sans catégorie' de sélectionné
            if (count($idCats) == 1 && in_array(SearchForm::WITHOUT_CAT, $idCats)) {
                $wheres[] = 'NOT EXISTS (SELECT 1 FROM snipcat sc WHERE sc.idSnip = s0.idSnip) ';
            } else {
                // Cas 2 : Plusieurs catégories sélectionnées
                // Ajout du filtre de catégorie
                foreach ($idCats as $key => $idCat) {
                    $req .= 'JOIN snipcat sc' . $key . ' ON s0.idSnip = sc' . $key . '.idSnip ';
                    $wheres[] = 'sc' . $key . '.idCat = ?';
                }
            }
        }
        if (!empty($idLangs)) {
            $langs = [];
            // Ajout du filtre de langage
            foreach ($idLangs as $idLang) {
                $langs[] = 's0.idLang = ? ';
            }
            $wheres[] = '(' . join(' OR ', $langs) . ') ';
        }
        // Ajout du filtre par rapport à la chaîne fournie
        if (!empty($chaine)) {
            $wheres[] = '(s0.code LIKE ? OR s0.comment LIKE ? OR s0.requirement LIKE ?)';
        }
        $req .= !empty($wheres) ? 'WHERE ' . join(' AND ', $wheres) : '';
        return $req;
    }

    /**
     * Permet de rechercher des snippets en fonction d'une chaine de caractères, d'un language, et de catégories
     * @param string $chaine Chaine de caractères recherchée dans les champs code, comment, et requirement
     * @param int[] $idLangs Tableau contenant les différents ids des langages recherchés
     * @param int[] $idCats Tableau contenant les différents ids des catégories recherchées
     * @param bool $one Si true, renvoit le premier snippet, par ordre croissant d'id du résultat de la recherche
     * sinon renvoit tous les snippets correspondant aux critères de la recherche
     * @return Snippet[]|Snippet|null
     */
    public function research(string $chaine, array $idLangs, array $idCats, bool $one = false)
    {
        $chaines = [];
        if ($chaine != null && $chaine != '') {
            $chaine = '%' . $chaine . '%';
            $chaines = [$chaine, $chaine, $chaine];
        }

        // Création de la liste des paramètres à transmettre à la requète
        $params = array_merge(array_diff($idCats, [SearchForm::WITHOUT_CAT]), $idLangs, $chaines);
        // Si on veut juste le premier snippet du résultat alors on va ajouter la partie avec l'ORDER BY
        if ($one) {
            $req = $this->createRequest($chaine, $idLangs, $idCats) . ' ORDER BY s0.idSnip ASC LIMIT 1';
            $stmt = $this->db->prepare($req);
            $stmt->execute($params);
            $assocs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $assocs ? $this->convInObj($assocs) : null;
        }
        $req = $this->createRequest($chaine, $idLangs, $idCats);
        $stmt = $this->db->prepare($req);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objs = [];
        foreach ($results as $assocs) {
            $objs[] = $this->convInObj($assocs);
        }
        return $objs;
    }

}
