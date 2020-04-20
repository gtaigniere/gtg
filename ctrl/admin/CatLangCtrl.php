<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
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
     * @var LanguageManager
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
        $languages = $this->languageManager->findAll();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

}