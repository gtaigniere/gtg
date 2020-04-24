<?php

namespace Router;

use Ctrl\Controller;
use Ctrl\HomeCtrl;
use Ctrl\LinkCtrl;
use Ctrl\RecetteCtrl;
use Ctrl\RubricCtrl;
use Ctrl\SnippetCtrl;
use Ctrl\VnCtrl;
use Ctrl\Admin\LinkCtrl as AdmLnkCtrl;
use Ctrl\Admin\TypRubCtrl as AdmTypRubCtrl;
use Ctrl\Admin\TypeCtrl as AdmTypCtrl;
use Ctrl\Admin\RubricCtrl as AdmRubCtrl;
use Ctrl\Admin\SnippetCtrl as AdmSnipCtrl;
use Ctrl\Admin\UserCtrl as AdmUsrCtrl;
use Ctrl\Admin\RecetteCtrl as AdmRecCtrl;
use Html\Form;
use PDO;

class Router
{
    /**
     * @var array
     */
    private $params;

    /**
     * @var PDO
     */
    private $db;

    /**
     * RouterNew constructor.
     * @param array $params
     * @param PDO $db
     */
    public function __construct(array $params, PDO $db)
    {
        $this->params = $params;
        $this->db = $db;
    }

    public function route(): void
    {
        if (isset($this->params['target'])) {
            switch ($this->params['target']) {
                case 'rubric':
                    $this->rubric();
                    break;
                case 'autres_sites':
                    $this->otherSites();
                    break;
                case 'link':
                    $this->link();
                    break;
                case 'vietnam':
                    $this->vietnam();
                    break;
                case 'galerie':
                    $this->galerie();
                    break;
                case 'recette':
                    $this->recette();
                    break;
                case 'contact':
                    $this->contact();
                    break;
                case 'snippet':
                    $this->snippet();
                    break;
                case 'admin':
                    $this->admin();
                    break;
                default:
                    $this->notFound();
            }
        } else {
            $this->rubric();
        }
    }

    private function rubric(): void
    {
        $ctrl = new RubricCtrl($this->db);
        if (isset($this->params['id'])) { // Si un id de rubrique est présent alors on l'affiche
            $ctrl->show($this->params['id']);
        } else { // Sinon on affiche la page d'accueil
            $ctrl->index();
        }
    }

    private function otherSites(): void
    {
        (new HomeCtrl())->otherSites();
    }

    private function vietnam(): void
    {
        (new VnCtrl($this->db))->home();
    }

    private function galerie(): void
    {
        (new VnCtrl($this->db))->galerie();
    }

    private function contact(): void
    {
        (new HomeCtrl())->contact();
    }

    private function notFound(): void
    {
        (new Controller())->notFound();
    }

    private function recette(): void
    {
        if (isset($this->params['id'])) { // Si un id de recette est présent alors on l'affiche
            $ctrl = new RecetteCtrl($this->db);
            $ctrl->show($this->params['id']);
        } else { // Sinon on affiche la page vietnam
            $ctrl = new VnCtrl($this->db);
            $ctrl->home();
        }
    }

    private function link(): void
    {
        if (isset($this->params['action']) &&
            $this->params['action'] == 'open' &&
            isset($this->params['id'])
        ) {
            $ctrl = new LinkCtrl($this->db);
            $ctrl->open($this->params['id']);
        } else {
            $this->notFound();
        }
    }

    private function snippet(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'lang':
                    $this->snipByLang();
                    break;
                case 'cat':
                    $this->snipByCat();
                    break;
                case 'langAndCat':
                    $this->snipByLangAndCat();
                    break;
                default:
                    $this->snippets();
            }
        } else {
            $this->snippets();
        }
    }

    private function snippets(): void
    {
        $ctrl = new SnippetCtrl($this->db);
        if (isset($this->params['id'])) {
            $ctrl->one($this->params['id']);
        } else {
            $ctrl->all();
        }
    }

    private function snipByLang(): void
    {
        $ctrl = new SnippetCtrl($this->db);
        $ctrl->allByLang();
    }

    private function snipByCat(): void
    {
        $ctrl = new SnippetCtrl($this->db);
        $ctrl->allByCat();
    }

    private function snipByLangAndCat(): void
    {
        $ctrl = new SnippetCtrl($this->db);
        $ctrl->allByLangAndCat();
    }

    private function admin(): void
    {
        if (isset($this->params['admTarg'])) {
            switch ($this->params['admTarg']) {
                case 'link':
                    $this->adminLink();
                    break;
                case 'typAndRub':
                    $this->typsAndRubs();
                    break;
                case 'type':
                    $this->adminType();
                    break;
                case 'rubric':
                    $this->adminRubric();
                    break;
                case 'user':
                    $this->adminUser();
                    break;
                case 'recette':
                    $this->adminRecette();
                    break;
                case 'snippet':
                    $this->adminSnippet();
                    break;
                default:
                    $this->adminLink();
            }
        } else {
            $this->adminLink();
        }
    }

    private function adminLink(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addLink();
                    break;
                case 'update':
                    $this->updLink();
                    break;
                case 'delete':
                    $this->delLink();
                    break;
                default:
                    $this->links();
            }
        } else {
            $this->links();
        }
    }

    private function addLink(): void
    {
        $ctrl = new AdmLnkCtrl($this->db);
        $form = new Form($_POST);
        $ctrl->ajouter($form);
    }

    private function updLink(): void
    {
        $ctrl = new AdmLnkCtrl($this->db);
        $form = new Form($_POST);
        $ctrl->modifier($form);
    }

    private function delLink(): void
    {
        $ctrl = new AdmLnkCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function links(): void
    {
        (new AdmLnkCtrl($this->db))->all();
    }

    private function adminType(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addTyp();
                    break;
                case 'update':
                    $this->updTyp();
                    break;
                case 'delete':
                    $this->delTyp();
                    break;
                default:
                    $this->typsAndRubs();
            }
        } else {
            $this->typsAndRubs();
        }
    }

    private function addTyp(): void
    {
        $ctrl =  new AdmTypCtrl($this->db);
        // Si on est en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Form($_POST);
            $ctrl->ajouter($form);
        } else {
            $ctrl->unauthorizedMethod();
        }
    }

    private function updTyp(): void
    {
        $ctrl =  new AdmTypCtrl($this->db);
        // Si on est en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Form($_POST);
            $ctrl->modifier($form);
        } else {
            $ctrl->unauthorizedMethod();
        }
    }

    private function delTyp(): void
    {
        $ctrl =  new AdmTypCtrl($this->db);
        if (isset($this->params['idType'])) {
            $form = new Form(
                // Fusion
                array_merge($_POST, ['idType' => $this->params['idType']])
            );
            $ctrl->supprimer($form);
        } else {
            $ctrl->notFound();
        }
    }

    private function typsAndRubs(): void
    {
        (new AdmTypRubCtrl($this->db))->all();
    }

    private function adminRubric(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addRub();
                    break;
                case 'update':
                    $this->updRub();
                    break;
                case 'delete':
                    $this->delRub();
                    break;
                default:
                    $this->typsAndRubs();
            }
        } else {
            $this->typsAndRubs();
        }
    }

    private function addRub(): void
    {
        $ctrl =  new AdmRubCtrl($this->db);
        // Si on est en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Form($_POST);
            $ctrl->ajouter($form);
        } else {
            $ctrl->unauthorizedMethod();
        }
    }

    private function updRub(): void
    {
        $ctrl =  new AdmRubCtrl($this->db);
        // Si on est en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Form($_POST);
            $ctrl->modifier($form);
        } else {
            $ctrl->unauthorizedMethod();
        }
    }

    private function delRub(): void
    {
        $ctrl =  new AdmRubCtrl($this->db);
        if (isset($this->params['idRub'])) {
            $form = new Form(
            // Fusion
                array_merge($_POST, ['idRub' => $this->params['idRub']])
            );
            $ctrl->supprimer($form);
        } else {
            $ctrl->notFound();
        }
    }

    private function adminUser(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addUsr();
                    break;
                case 'update':
                    $this->updUsr();
                    break;
                case 'delete':
                    $this->delUsr();
                    break;
                default:
                    $this->users();
            }
        } else {
            $this->users();
        }
    }

    private function addUsr(): void
    {
        $ctrl =  new AdmUsrCtrl($this->db);
        // Si on est en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Form($_POST);
            $ctrl->ajouter($form);
        } else {
            $ctrl->unauthorizedMethod();
        }
    }

    private function updUsr(): void
    {
        $ctrl =  new AdmUsrCtrl($this->db);
        // Si on est en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Form($_POST);
            $ctrl->modifier($form);
        } else {
            $ctrl->unauthorizedMethod();
        }
    }

    private function delUsr(): void
    {
        $ctrl =  new AdmRubCtrl($this->db);
        if (isset($this->params['idUser'])) {
            $form = new Form(
            // Fusion de 2 tableaux avec la fonction "array_merge"
                array_merge($_POST, ['idUser' => $this->params['idUser']])
            );
            $ctrl->supprimer($form);
        } else {
            $ctrl->notFound();
        }
    }

    private function users(): void
    {
        (new AdmUsrCtrl($this->db))->all();
    }

    private function adminRecette(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addRec();
                    break;
                case 'update':
                    $this->updRec();
                    break;
                case 'delete':
                    $this->delRec();
                    break;
                default:
                    $this->recettes();
            }
        } else {
            $this->recettes();
        }
    }

    private function addRec(): void
    {
        (new AdmRecCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updRec(): void
    {
        $ctrl = new AdmRecCtrl($this->db);
        if (array_key_exists('id', $this->params) && is_numeric($this->params['id'])) {
            $ctrl->modifier($this->params['id'], new Form($_POST));
        } else {
            $ctrl->notFound();
        }
    }

    private function delRec(): void
    {
        $ctrl = new AdmRecCtrl(($this->db));
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function recettes(): void
    {
        (new AdmRecCtrl($this->db))->all();
    }

    private function adminSnippet(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addSnip();
                    break;
                case 'update':
                    $this->updSnip();
                    break;
                case 'delete':
                    $this->delSnip();
                    break;
                default:
                    $this->snippets();
            }
        } else {
            $this->snippets();
        }
    }

    private function addSnip(): void
    {
        (new AdmSnipCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updSnip(): void
    {
        $ctrl = new AdmSnipCtrl($this->db);
        if (is_numeric($_GET['id'])) {
            $ctrl->modifier($_GET['id'], new Form($_POST));
        } else {
            $ctrl->notFound();
        }
    }

    private function delSnip(): void
    {
        $ctrl = new AdmSnipCtrl(($this->db));
        if (is_numeric($_GET['id'])) {
            $ctrl->supprimer($_GET['id'], new Form($_POST));
        } else {
            $ctrl->notFound();
        }
    }

}