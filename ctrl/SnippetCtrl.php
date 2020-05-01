<?php

namespace Ctrl;

use Exception;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use Manager\UserManager;
use Model\Snippet;
use PDO;

class SnippetCtrl extends Controller
{
    /**
     * @var SnippetManager
     */
    private $snippetManager;

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
     * SnippetCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->snippetManager = new SnippetManager($db);
        $this->languageManager = new LanguageManager($db);
        $this->userManager = new UserManager($db);
        $this->catManager = new CatManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findOne($id);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function last(): void
    {
//        $snippets = $this->snippetManager->findAll();
//        $snippet = $this->snippetManager->findOne($id);
        $snippet = $this->lastWithCats();
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @return void
     */
    public function allWithCats(): void
    {
        $snippets = $this->snippetManager->all();
    }

    /**
     * @param $id
     * @return Snippet|null
     */
    public function oneWithCats($id): ?Snippet
    {
//        $assocs = $this->snippetManager->one($id);
//        $snippet = new Snippet();
//        $snippet->setIdSnip($assocs['idSnip']);
//        $snippet->setTitle($assocs['title']);
//        $snippet->setCode($assocs['code']);
//        $snippet->setDateCrea($assocs['dateCrea']);
//        $snippet->setComment($assocs['comment']);
//        $snippet->setRequirement($assocs['requirement']);
//        $language = $this->languageManager->findOne($assocs['idLang']);
//        $snippet->setLanguage($language);
//        $user = $this->userManager->findOneForSnippet($assocs['idUser']);
//        $snippet->setUser($user);
//        $cats = $this->catManager->CatsBySnip($id);
//        $snippet->setCats($cats);
        $snippet = $this->snippetManager->all();
    }

    /**
     * @param $id
     * @return Snippet|null
     * @throws Exception
     */
    public function lastWithCats($id): ?Snippet
    {
        $assocs = $this->snippetManager->last($id);
        $snippet = new Snippet();
        $snippet->setIdSnip($assocs['idSnip']);
        $snippet->setTitle($assocs['title']);
        $snippet->setCode($assocs['code']);
        $snippet->setDateCrea($assocs['dateCrea']);
        $snippet->setComment($assocs['comment']);
        $snippet->setRequirement($assocs['requirement']);
        $language = $this->languageManager->findOne($assocs['idLang']);
        $snippet->setLanguage($language);
        $user = $this->userManager->findOneForSnippet($assocs['idUser']);
        $snippet->setUser($user);
        $cats = $this->catManager->CatsBySnip($id);
        $snippet->setCats($cats);
        return $snippet;
    }

    /**
     * @return void
     */
    public function allByLang(int $id): void
    {
//        $snippets = $this->snippetManager->findByLang($id);
//        $snippet = $this->snippetManager->findLastByLang($id);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @return void
     */
    public function allByCat(int $id): void
    {
//        $snippets = $this->snippetManager->findByCat($id);
//        $snippet = $this->snippetManager->findLastByCat($id);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param int $idCat
     * @param int $idLang
     * @return void
     */
    public function allByLangAndCat(int $idLang, int $idCat): void
    {
//        $snippets = $this->snippetManager->findByLangAndCat($idLang, $idCat);
//        $snippet = $this->snippetManager->findLastByLangAndCat($idLang, $idCat);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

}