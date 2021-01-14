<?php

namespace Ctrl\Admin;

use Core\{
    Html\Form,
    Util\ErrorManager,
    Util\SuccessManager
};
use DateTime;
use Exception;
use Form\{
    AdmSearchForm,
    SearchForm,
    SnippetForm
};
use Manager\{
    CatManager,
    LanguageManager,
    SnippetManager,
    UserManager
};
use Model\{
    Language,
    Snippet,
    UserForSnip
};
use PDO;
use PDOException;
use Service\AuthService;

/**
 * Contrôleur associé à la section Snippets
 * @package Ctrl\Admin
 */
class SnippetCtrl extends AdminCtrl
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
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la liste des snippets
     * @return void
     */
    public function all(): void
    {
        $search = false;
        $searchForm = new AdmSearchForm();
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        $this->render(ROOT_DIR . 'view/admin/snippet.php',
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
        $this->render(ROOT_DIR . 'view/admin/snippet.php',
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
        $chaine = htmlentities($searchForm->getValue('search'));
        $idLangs = $searchForm->getValue('languages') != null ? $searchForm->getValue('languages') : [];
        $idCats = $searchForm->getValue('cats') ? $searchForm->getValue('cats') : [];
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->research($chaine, $idLangs, $idCats);
        $snippet = $this->snippetManager->research($chaine, $idLangs, $idCats, true);
        $this->render(ROOT_DIR . 'view/admin/snippet.php',
            compact('search', 'searchForm', 'chaine',
                'idLangs', 'idCats', 'languages',
                'cats','snippets', 'snippet'));
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
            $search = false;
            $searchForm = new SearchForm();
            $form = new Form();
            $languages = $this->languageManager->findAll();
            $cats = $this->catManager->findAll();
            $snippets = $this->snippetManager->findAll();
            $action = 'insert';
            $this->render(ROOT_DIR . 'view/admin/snipForm.php',
                compact('search', 'searchForm','form', 'languages',
                    'cats', 'snippets', 'action'));
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function modifier(int $id, Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->upd($id, $form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $snippet = $this->snippetManager->findOne($id);
            if ($snippet != null) {
                $search = false;
                $searchForm = new SearchForm();
                $form = new SnippetForm($snippet);
                $language = new Language();
                $language = $form->getValue('idLang');
                $language = is_numeric($language) ? $this->languageManager->findOne((int)$language) : null;
                $user = new UserForSnip();
                $user->setPseudo($snippet->getUser()->getPseudo());
                $form->add('pseudo', $user->getPseudo());
                $languages = $this->languageManager->findAll();
                $cats = $this->catManager->findAll();
                $snippets = $this->snippetManager->findAll();
                $action = 'update';
                $this->render(ROOT_DIR . 'view/admin/snipForm.php',
                    compact('snippet', 'search', 'searchForm', 'form',
                        'language', 'user', 'languages',
                        'cats', 'snippets', 'action'));
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
                $search = false;
                $searchForm = new Form();
                $form = new SnippetForm($snippet);
                $languages = $this->languageManager->findAll();
                $cats = $this->catManager->findAll();
                $snippets = $this->snippetManager->findAll();
                $action = 'delete';
                $this->render(ROOT_DIR . 'view/admin/snipForm.php',
                    compact('snippet', 'search', 'searchForm', 'form',
                        'languages', 'cats', 'snippets', 'action'));
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
        $snippet = new Snippet();
        $snippet->setTitle($form->getValue('title'));
        $snippet->setcode($form->getValue('code'));
        $snippet->setDateCrea(
            $form->getValue('dateCrea') != null ? $form->getValue('dateCrea') : new DateTime()
        );
        $snippet->setComment($form->getValue('comment'));
        $snippet->setRequirement($form->getValue('requirement'));
        $language = $form->getValue('idLang');
        $language = is_numeric($language) ? $this->languageManager->findOne((int)$language) : null;
        $snippet->setLanguage($language);
        $currentUser = AuthService::getUser();
        $user = new UserForSnip();
        $user->setIdUser($currentUser->getIdUser());
        $user->setPseudo($currentUser->getPseudo());
        $snippet->setUser($user);
        $idCats = $form->getValue('cats');
        if ($idCats != '') {
            $cats = [];
            foreach ($idCats as $idCat) {
                $cats[] = $this->catManager->findOne($idCat);
            }
            $snippet->setCats($cats);
        }
        $snippet = $this->snippetManager->insert($snippet);
        if ($snippet == null) {
            ErrorManager::add('Erreur lors de l\'ajout du snippet !');
        } else {
            SuccessManager::add('Le snippet a été ajouté avec succès.');
        }
        $search = false;
        $searchForm = new Form();
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        $this->render(ROOT_DIR . 'view/admin/snippet.php',
            compact('language', 'user', 'idCats',
                'search', 'searchForm', 'languages',
                'cats', 'snippets', 'snippet'));
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function upd(int $id, Form $form): void
    {
        $snippet = $this->snippetManager->findOne($id);
        if ($snippet != null) {
            $snippet->setTitle($form->getValue('title'));
            $snippet->setCode($form->getValue('code'));
            $tmpDate = $form->getValue('dateCrea');
            $dateCrea = date('Y-m-d H:i:s', strtotime($tmpDate));
            $snippet->setDateCrea($dateCrea);
            $snippet->setComment($form->getValue('comment'));
            $snippet->setRequirement($form->getValue('requirement'));
            $idLang = $form->getValue('idLang');
            $language = is_numeric($idLang) ? $this->languageManager->findOne((int)$idLang) : null;
            $snippet->setLanguage($language);
            $idCats = $form->getValue('cats');
            if ($idCats != '') {
                $cats = [];
                foreach ($idCats as $idCat) {
                    $cats[] = $this->catManager->findOne($idCat);
                }
                $snippet->setCats($cats);
            }
            $snippet = $this->snippetManager->update($snippet);
            if ($snippet == null) {
                ErrorManager::add('Erreur lors de la modification du snippet !');
            } else {
                SuccessManager::add('Le snippet a été modifié avec succès.');
            }
            $search = false;
            $searchForm = new Form();
            $languages = $this->languageManager->findAll();
            $cats = $this->catManager->findAll();
            $snippets = $this->snippetManager->findAll();
            $snippet = $this->snippetManager->findLast();
            $this->render(ROOT_DIR . 'view/admin/snippet.php',
                compact('tmpDate', 'dateCrea', 'idLang',
                    'language', 'idCats', 'search',
                    'searchForm', 'languages', 'cats',
                    'snippets', 'snippet'));
        } else {
            $this->notFound();
        }
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
        $search = false;
        $searchForm = new Form();
        $languages = $this->languageManager->findAll();
        $cats = $this->catManager->findAll();
        $snippets = $this->snippetManager->findAll();
        $snippet = $this->snippetManager->findLast();
        $this->render(ROOT_DIR . 'view/admin/snippet.php',
            compact('search', 'searchForm', 'languages',
            'cats', 'snippets', 'snippet'));
    }

}
