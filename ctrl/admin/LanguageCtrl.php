<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\CatForm;
use Form\LanguageForm;
use Html\Form;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use Model\Language;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class LanguageCtrl extends Controller
{
    /**
     * @var LanguageManager
     */
    private $languageManager;

    /**
     * @var CatManager
     */
    private $catManager;

    /**
     * @var SnippetManager
     */
    private $snippetManager;

    /**
     * LanguageCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->languageManager = new LanguageManager($db);
        $this->catManager = new CatManager($db);
        $this->snippetManager = new SnippetManager($db);
    }

    /**
     * @param Form $form
     * @return void
     */
    public function ajouter(Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->add($form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $this->unauthorizedMethod();
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function modifier(Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->upd($form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $this->unauthorizedMethod();
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function supprimer(int $id, Form $form): void
    {
        // Si on est en POST et que c'est validé
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form->getValue('validate') != null) {
            // Alors on supprime les données
            $this->del($id);
        } else {
            $this->validate([]);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function add(Form $form): void
    {
        $language = new Language();
        $language->setLabel($form->getValue('label'));
        $language = $this->languageManager->insert($language);
        if ($language == null) {
            ErrorManager::add('Erreur lors de l\'ajout du language !');
        } else {
            SuccessManager::add('Le language a été ajouté avec succès.');
        }
        $snippets = $this->snippetManager->findAll();
        $languages = $this->languageManager->findAll();
        $languageForms = [];
        foreach($languages as $language) {
            $languageForms[] = new LanguageForm($language);
        }
        $formAddLang = new Form();
        $cats = $this->catManager->findAll();
        $catForms = [];
        foreach($cats as $cat) {
            $catForms[] = new CatForm($cat);
        }
        $formAddCat = new Form();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $language = new Language();
        $language->setLabel($form->getValue('label'));
        $language->setIdLang($form->getValue('id'));
        $language = $this->languageManager->update($language);
        if ($language == null) {
            ErrorManager::add('Erreur lors de la modification du language !');
        } else {
            SuccessManager::add('Le language a été modifié avec succès.');
        }
        $snippets = $this->snippetManager->findAll();
        $languages = $this->languageManager->findAll();
        $languageForms = [];
        foreach($languages as $language) {
            $languageForms[] = new LanguageForm($language);
        }
        $formAddLang = new Form();
        $cats = $this->catManager->findAll();
        $catForms = [];
        foreach($cats as $cat) {
            $catForms[] = new CatForm($cat);
        }
        $formAddCat = new Form();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->languageManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression du language !');
        } else {
            SuccessManager::add('Le language a été supprimé avec succès.');
        }
        $snippets = $this->snippetManager->findAll();
        $languages = $this->languageManager->findAll();
        $languageForms = [];
        foreach($languages as $language) {
            $languageForms[] = new LanguageForm($language);
        }
        $formAddLang = new Form();
        $cats = $this->catManager->findAll();
        $catForms = [];
        foreach($cats as $cat) {
            $catForms[] = new CatForm($cat);
        }
        $formAddCat = new Form();
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