<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\CatForm;
use Form\LanguageForm;
use Html\Form;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use Model\Cat;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class CatCtrl extends Controller
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
     * CatCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->catManager = new CatManager($db);
        $this->languageManager = new LanguageManager($db);
        $this->snippetManager = new SnippetManager($db);
    }

    /**
     * @param Form $form
     * @return void
     */
    public function ajouter(Form $form): void
    {
        // Si le formulaire est validé
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
            // Si le formulaire est validé
            if ($form->getValue('validate') != null) {
                // Alors on persiste les données
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
        $cat = new Cat();
        $cat->setLabel($form->getValue('label'));
        $cat = $this->catManager->insert($cat);
        if ($cat == null) {
            ErrorManager::add('Erreur lors de l\'ajout de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été ajouté avec succès.');
        }
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
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $cat = new Cat();
        $cat->setLabel($form->getValue('label'));
        $cat->setIdCat($form->getValue('id'));
        $cat = $this->catManager->update($cat);
        if ($cat == null) {
            ErrorManager::add('Erreur lors de la modification de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été modifié avec succès.');
        }
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
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->catManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été supprimé avec succès.');
        }
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