<?php

namespace Ctrl;

use Form\SearchForm;
use Html\Form;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use Manager\UserManager;
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
        $search = false;
        $searchForm = new SearchForm();
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
        $search = false;
        $searchForm = new Form();
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findOne($id);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param SearchForm $searchForm
     */
    public function search(SearchForm $searchForm): void
    {
        $search = true;
        $chaine = $searchForm->getValue('search');
        $idLangs = $searchForm->getValue('languages') != null ? $searchForm->getValue('languages') : [];
        $idCats = $searchForm->getValue('cats') ? $searchForm->getValue('cats') : [];
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->research($chaine, $idLangs, $idCats);
        $snippet = $this->snippetManager->research($chaine, $idLangs, $idCats, true);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

}