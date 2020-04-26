<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Exception;
use Form\SnippetForm;
use Html\Form;
use Manager\CatManager;
use Manager\LanguageManager;
use Manager\SnippetManager;
use Manager\UserManager;
use Model\Cat;
use Model\Snippet;
use Model\UserForSnip;
use PDO;
use PDOException;
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
     * @var UserForSnip
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
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function ajouter(Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Si le formulaire est validé
            if ($form->getValue('validate') != null) {
                // Alors on persiste les données
                $this->add($form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $languages = $this->languageManager->findAll();
            $cats = $this->catManager->findAll();
            $snippets = $this->snippetManager->findAll();
            $action = 'insert';
            require_once(ROOT_DIR . 'view/admin/snippet.php');
            require_once(ROOT_DIR . 'view/template-snip.php');
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function modifier(int $id, Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->upd($form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $snippet = $this->snippetManager->findOne($id);
            if ($snippet != null) {
                $form = new SnippetForm($snippet);
                $languages = $this->languageManager->findAll();
                $cats = $this->catManager->findAll();
                $snippets = $this->snippetManager->findAll();
                $action = 'update';
                require_once ROOT_DIR . 'view/admin/snippet.php';
                require_once ROOT_DIR . 'view/template-snip.php';
            } else {
                $this->notFound();
            }
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function supprimer(int $id, Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->del($id);
                $this->snippetManager->supCatsForSnip($id);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $snippet = $this->snippetManager->findOne($id);
            if ($snippet != null) {
                $form = new Form([
                    'idSnip' => $snippet->getIdSnip(),
                    'title' => $snippet->getTitle(),
                    'code' => $snippet->getCode(),
                    'dateCrea' => $snippet->getDateCrea()->format('d-m-Y H:i:s'),
                    'comment' => $snippet->getComment(),
                    'requirement' => $snippet->getRequirement(),
                    'language' => $snippet->getLanguage()->getIdLang(),
                    'user' => $snippet->getUser()->getIdUser(),
                    'cats' =>
                        array_map(function(Cat $cat) {
                            return $cat->getIdCat();
                        }, $snippet->getCats())
                ]);
                $languages = $this->languageManager->findAll();
                $cats = $this->catManager->findAll();
                $snippets = $this->snippetManager->findAll();
                $action = 'delete';
                require_once ROOT_DIR . 'view/admin/snippet.php';
                require_once ROOT_DIR . 'view/template-snip.php';
            } else {
                $this->notFound();
            }
        }
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function add(Form $form): void
    {
        $snippet = $this->snippetManager->insert($form);

        if ($snippet == null) {
            ErrorManager::add('Erreur lors de l\'ajout du snippet !');
        } else {
            SuccessManager::add('Le snippet a été ajouté avec succès.');
        }
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
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
        $idUser = $form->getValue('idUser');
        $user = is_numeric($idUser) ? $this->userManager->findOne((int)$idUser) : null;
        $snippet->setUser($user);
        $cats = $form->getValue('cats');
        $snippet->setCats($cats);
        $snippet = $this->snippetManager->update($snippet);
        if ($snippet == null) {
            ErrorManager::add('Erreur lors de la modification du snippet !');
        } else {
            SuccessManager::add('Le snippet a été modifié avec succès.');
        }
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
    public function del(int $id): void
    {
        try {
            $this->snippetManager->delete($id);
            $this->snippetManager->supCatsForSnip($id);
            SuccessManager::add('Le snippet a été supprimé avec succès.');
        } catch(PDOException $e) {
            ErrorManager::add('Erreur lors de la suppression du snippet !');
        }
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        require_once (ROOT_DIR . 'view/snippet.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
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