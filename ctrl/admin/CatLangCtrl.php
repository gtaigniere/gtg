<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\CatForm;
use Form\LanguageForm;
use Html\Form;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use PDO;

class CatLangCtrl extends Controller
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
    }

    /**
     * @return void
     */
    public function all(): void
    {
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
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
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