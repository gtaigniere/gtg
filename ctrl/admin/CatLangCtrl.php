<?php

namespace Ctrl\Admin;

use Form\{
    CatForm,
    LanguageForm,
    SearchForm
};
use Core\Html\Form;
use Manager\{
    CatManager,
    LanguageManager,
    SnippetManager
};
use PDO;

/**
 * Contrôleur associé à la section Admin/Catégories et Admin/Langages
 * @package Ctrl\Admin
 */
class CatLangCtrl extends AdminCtrl
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
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la liste des Catégories et des langages
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

}
