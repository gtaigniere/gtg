<?php

namespace Ctrl;

use Form\SearchForm;
use Core\Html\Form;
use Manager\{
    CatManager,
    LanguageManager,
    SnippetManager,
    UserManager
};
use PDO;

/**
 * Contrôleur associé à la section Snippets
 * @package Ctrl
 */
class SnippetCtrl extends GtgController
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
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche tous les snippets
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
        $this->render(ROOT_DIR . 'view/snippet.php',
            compact('search', 'searchForm', 'languages',
            'cats', 'snippets', 'snippet'));
    }

    /**
     * Affiche le snippet dont l'id est passé en paramètre
     * @param int $id
     * @param Form $searchForm
     * @return void
     */
    public function one(int $id, Form $searchForm): void
    {
        $search = false;
        $chaine = $searchForm->getValue('search') != null ? $searchForm->getValue('search') : '';
        $idLangs = $searchForm->getValue('languages') != null ? $searchForm->getValue('languages') : [];
        $idCats = $searchForm->getValue('cats') ? $searchForm->getValue('cats') : [];
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->research($chaine, $idLangs, $idCats);
        $snippet = $this->snippetManager->findOne($id);
        $this->render(ROOT_DIR . 'view/snippet.php',
            compact('search', 'searchForm', 'languages',
                'cats', 'snippets', 'snippet'));
    }

    /**
     * Affiche le formulaire de recherche
     * @param Form $searchForm
     */
    public function search(Form $searchForm): void
    {
        $search = true;
        $chaine = $searchForm->getValue('search');
        $idLangs = $searchForm->getValue('languages') != null ? $searchForm->getValue('languages') : [];
        $idCats = $searchForm->getValue('cats') ? $searchForm->getValue('cats') : [];
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->research($chaine, $idLangs, $idCats);
        $snippet = $this->snippetManager->research($chaine, $idLangs, $idCats, true);
        $this->render(ROOT_DIR . 'view/snippet.php',
            compact('search', 'searchForm', 'chaine',
                'idLangs', 'idCats', 'languages',
                'cats', 'snippets', 'snippet'));
    }

}
