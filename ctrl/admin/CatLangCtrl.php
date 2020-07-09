<?php

namespace Ctrl\Admin;

use Ctrl\GtgController;
use Form\CatForm;
use Form\LanguageForm;
use Form\SearchForm;
use Html\Form;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use PDO;

/**
 * Class CatLangCtrl
 * Contrôleur associé à la section Admin/Catégories et Admin/Langages
 * @package Ctrl\Admin
 */
class CatLangCtrl extends GtgController
{
    /**
     * @var CatManager
     */
    protected $catManager;

    /**
     * @var LanguageManager
     */
    protected $languageManager;

    /**
     * @var SnippetManager
     */
    protected $snippetManager;

    /**
     * TypeCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->catManager = new CatManager($db);
        $this->languageManager = new LanguageManager($db);
        $this->snippetManager = new SnippetManager($db);
        parent::__construct(ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * Affiche la page de la liste des Catégories et des langages
     * @return void
     */
    public function all(): void
    {
        $search = false;
        $searchForm = new SearchForm();
        $snippets = $this->snippetManager->findAll();
        $cats = $this->catManager->findAll();
        $catForms = [];
        foreach($cats as $cat) {
            $catForms[] = new CatForm($cat);
        }
        $formAddCat = new Form();
        $languages = $this->languageManager->findAll();
        $languageForms = [];
        foreach($languages as $language) {
            $languageForms[] = new LanguageForm($language);
        }
        $formAddLang = new Form();
        $this->render(ROOT_DIR . 'view/admin/catsandlangs.php',
            compact('search', 'searchForm', 'snippets',
                'cats', 'catForms', 'formAddCat',
                'languages', 'languageForms', 'formAddLang'));
    }

    /**
     * Affiche la page de validation d'ajout, de modification, et de suppression
     * @param array $datas
     * @return void
     */
    public function validate(array $datas): void
    {
        // Vérifier le type des variables
        require_once (ROOT_DIR . 'view/admin/validation.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}