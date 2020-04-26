<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\CatForm;
use Form\LanguageForm;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use PDO;

class CatLangCtrl extends Controller
{
    /**
     * @var CatManager
     */
    private $catManager;

    /**
     * @var LanguageManager
     */
    private $languageManager;

    /**
     * @var SnippetManager
     */
    private $snippetManager;

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
        $languages = $this->languageManager->findAll();
        $languageForms = [];
        foreach($languages as $language) {
            $languageForms[] = new LanguageForm($language);
        }
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

}