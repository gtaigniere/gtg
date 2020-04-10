<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Html\Form;
use Manager\LanguageManager;
use Manager\SnippetManager;
use Model\Snippet;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

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
     * SnippetCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->snippetManager = new SnippetManager($db);
        $this->languageManager = new LanguageManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $snippets = $this->snippetManager->findAll();
        require_once(ROOT_DIR . 'view/???.php');
        require_once(ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param int $id
     */
    public function one(int $id): void
    {
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findOne($id);
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param Form $form
     */
    public function ajouter(Form $form): void
    {
        // Si le formulaire est validé
        if (isset($_POST['validate'])) {
            // Alors on persiste les données
            $this->add($form);
        }
        // Sinon on le valide
        else {
            $this->validate($_POST);
        }
    }

    /**
     * @param Form $form
     */
    public function modifier(Form $form): void
    {
        // Si le formulaire est validé
        if (isset($_POST['validate'])) {
            // Alors on persiste les données
            $this->upd($form);
        } // Sinon on le valide
        else {
            $this->validate($_POST);
        }
    }

    /**
     * @param Form $form
     */
    public function supprimer(Form $form): void
    {
        // Si on est en POST et que c'est validé
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form->getValue('validate') != null) {
            // Alors on supprime les données
            $this->del($form->getValue('idSnip'));
        } // Sinon on le valide
        else {
            $this->validate(['idSnip' => $form->getValue('idSnip')]);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function add(Form $form): void
    {
        $snippet = new Snippet();
        $snippet->setTitle($form->getValue('title'));
        $snippet->setDateCrea($form->getValue('dateCrea'));
        $snippet->setComment($form->getValue('comment'));
        $snippet->setRequirement($form->getValue('requirement'));
        $idLang = $form->getValue('idLang');
        $language = is_numeric($idLang) ? $this->languageManager->findOne((int)$idLang) : null;
        $snippet->setLanguage($language);
        $snippet->setIdUser($form->getValue('idUser'));
        $snippet = $this->snippetManager->insert($snippet);
        if ($snippet == null) {
            ErrorManager::add('Erreur lors de l\'ajout du snippet !');
        } else {
            SuccessManager::add('Le snippet a été ajouté avec succès.');
        }
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        require_once(ROOT_DIR . 'view/???.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $snippet = new Snippet();
        $snippet->setTitle($form->getValue('title'));
        $snippet->setDateCrea($form->getValue('dateCrea'));
        $snippet->setComment($form->getValue('comment'));
        $snippet->setRequirement($form->getValue('requirement'));
        $idLang = $form->getValue('idLang');
        $language = is_numeric($idLang) ? $this->languageManager->findOne((int)$idLang) : null;
        $snippet->setLanguage($language);
        $snippet->setIdUser($form->getValue('idUser'));
        $snippet = $this->snippetManager->update($snippet);
        if ($snippet == null) {
            ErrorManager::add('Erreur lors de la modification du snippet !');
        } else {
            SuccessManager::add('Le snippet a été modifié avec succès.');
        }
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findOne();
        require_once(ROOT_DIR . 'view/???.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->snippetManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression du snippet !');
        } else {
            SuccessManager::add('Le snippet a été supprimé avec succès.');
        }
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findOne();
        require_once(ROOT_DIR . 'view/???.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

}