<?php

namespace Router;

use Ctrl\{
    AuthCtrl,
    GtgController,
    HomeCtrl,
    LinkCtrl,
    RecetteCtrl,
    RubricCtrl,
    SnippetCtrl,
    VnCtrl
};
use Ctrl\Admin\{
    CatLangCtrl as AdmCatLngCtrl,
    CatCtrl as AdmCatCtrl,
    ContactCtrl as AdmContCtrl,
    LanguageCtrl as AdmLngCtrl,
    LinkCtrl as AdmLnkCtrl,
    TypRubCtrl as AdmTypRubCtrl,
    TypeCtrl as AdmTypCtrl,
    RubricCtrl as AdmRubCtrl,
    SnippetCtrl as AdmSnipCtrl,
    UserCtrl as AdmUsrCtrl,
    RecetteCtrl as AdmRecCtrl
};
use Exception\PourNotNumericException;
use Form\{
    AdmSearchForm,
    RecetteForm,
    SearchForm
};
use Core\{
    Html\Form,
    Util\ErrorManager
};
use PDO;

/**
 * C'est le routeur du site
 * @package Router
 */
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
     * Router constructor.
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
                case 'auth':
                    $this->auth();
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
        $form = new Form($_POST);
        (new HomeCtrl())->contact($form);
    }


    private function notFound(): void
    {
        (new GtgController())->notFound();
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
                case 'search':
                    $this->snipSearch();
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
            $ctrl->one($this->params['id'], new SearchForm($this->params));
        } else {
            $ctrl->all();
        }
    }

    private function snipSearch(): void
    {
        $ctrl = new SnippetCtrl($this->db);
        if (!empty($this->params)) {
            $form = new SearchForm($this->params);
            $ctrl->search($form);
        } else {
            $ctrl->all();
        }
    }

    private function auth(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'subscribe':
                    $this->subscribe();
                    break;
                case 'loginForm':
                    $this->loginForm();
                    break;
                default:
                    (new RubricCtrl($this->db))->index();
            }
        } else {
            (new RubricCtrl($this->db))->index();
        }
    }

    public function subscribe()
    {
        (new AuthCtrl($this->db))->subscribe();
    }

    public function loginForm()
    {
        (new AuthCtrl($this->db))->loginForm();
    }

    private function admin(): void
    {
        if (isset($this->params['admTarg'])) {
            switch ($this->params['admTarg']) {
                case 'contact':
                    $this->adminContact();
                    break;
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
                case 'catAndLang':
                    $this->catsAndLangs();
                    break;
                case 'cat':
                    $this->adminCat();
                    break;
                case 'language':
                    $this->adminLanguage();
                    break;
                default:
                    $this->adminLink();
            }
        } else {
            $this->adminLink();
        }
    }

    private function adminContact(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'reply':
                    $this->repContact();
                    break;
                case 'sendReply':
                    $this->sendReply();
                    break;
                case 'insert':
                    $this->addContact();
                    break;
                case 'delete':
                    $this->delContact();
                    break;
                default:
                    $this->contacts();
            }
        } else {
            $this->contacts();
        }
    }

    private function repContact(): void
    {
        $ctrl = new AdmContCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $ctrl->repondre($this->params['id']);

        } else {
            $ctrl->notFound();
        }
    }

    private function sendReply(): void
    {
        $ctrl = new AdmContCtrl($this->db);
        $form = new Form($_POST);
        $ctrl->envRep($form);
    }

    private function addContact(): void
    {
        $ctrl = new AdmContCtrl($this->db);
        $form = new Form($_POST);
        $ctrl->ajouter($form);
    }

    private function delContact(): void
    {
        $ctrl = new AdmContCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function contacts(): void
    {
        (new AdmContCtrl($this->db))->all();
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
        (new AdmLnkCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updLink(): void
    {
        $ctrl = new AdmLnkCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->modifier($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
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
        (new AdmTypCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updTyp(): void
    {
        $ctrl = new AdmTypCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->modifier($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function delTyp(): void
    {
        $ctrl = new AdmTypCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
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
        (new AdmRubCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updRub(): void
    {
        $ctrl = new AdmRubCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->modifier($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function delRub(): void
    {
        $ctrl = new AdmRubCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
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
        (new AdmUsrCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updUsr(): void
    {
        $ctrl = new AdmUsrCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->modifier($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function delUsr(): void
    {
        $ctrl = new AdmUsrCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
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
        try {
            (new AdmRecCtrl($this->db))->ajouter(new RecetteForm($_POST));
        } catch (PourNotNumericException $e) {
            ErrorManager::add('Le champ \'pour\' doit contenir une valeur numérique !');
            $valuesWithErrors = array_diff_key($_POST, ['pour' => '']); // Copie des valeurs transmises en supprimant la clef 'pour'
            $form = new Form($valuesWithErrors);
            $ctrl = new AdmRecCtrl($this->db);
            $ctrl->modifierAvantAjouter($form);
        }
    }

    private function updRec(): void
    {
        $ctrl = new AdmRecCtrl($this->db);
        if (array_key_exists('id', $this->params) && is_numeric($this->params['id'])) {
            try {
                $ctrl->modifier($this->params['id'], new RecetteForm($_POST));
            } catch (PourNotNumericException $e) {
                ErrorManager::add('Le champ \'pour\' doit contenir une valeur numérique !');
                $valuesWithErrors = array_diff_key($_POST, ['pour' => '']); // Copie des valeurs transmises en supprimant la clef 'pour'
                $form = new Form($valuesWithErrors);
                $ctrl = new AdmRecCtrl($this->db);
                $ctrl->modifierAvantAjouter($form);
            }
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
                case 'search':
                    $this->adminSnipSearch();
                    break;
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
            $this->admSnippets();
        }
    }

    private function admSnippets(): void
    {
        $ctrl = new AdmSnipCtrl($this->db);
        if (isset($this->params['id'])) {
            $ctrl->one($this->params['id'], new AdmSearchForm($this->params));
        } else {
            $ctrl->all();
        }
    }

    private function adminSnipSearch(): void
    {
        $ctrl = new AdmSnipCtrl($this->db);
        if (!empty($this->params)) {
            $form = new AdmSearchForm($this->params);
            $ctrl->search($form);
        } else {
            $ctrl->all();
        }
    }

    private function addSnip(): void
    {
        (new AdmSnipCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updSnip(): void
    {
        $ctrl = new AdmSnipCtrl($this->db);
        if (array_key_exists('id', $this->params) && is_numeric($this->params['id'])) {
            $ctrl->modifier($this->params['id'], new Form($_POST));
        } else {
            $ctrl->notFound();
        }
    }

    private function delSnip(): void
    {
        $ctrl = new AdmSnipCtrl(($this->db));
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function adminCat(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addCat();
                    break;
                case 'update':
                    $this->updCat();
                    break;
                case 'delete':
                    $this->delCat();
                    break;
                default:
                    $this->catsAndLangs();
            }
        } else {
            $this->catsAndLangs();
        }
    }

    private function addCat(): void
    {
        (new AdmCatCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updCat(): void
    {
        $ctrl = new AdmCatCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->modifier($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function delCat(): void
    {
        $ctrl = new AdmCatCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function catsAndLangs(): void
    {
        (new AdmCatLngCtrl($this->db))->all();
    }

    private function adminLanguage(): void
    {
        if (isset($this->params['action'])) {
            switch ($this->params['action']) {
                case 'insert':
                    $this->addLang();
                    break;
                case 'update':
                    $this->updLang();
                    break;
                case 'delete':
                    $this->delLang();
                    break;
                default:
                    $this->catsAndLangs();
            }
        } else {
            $this->catsAndLangs();
        }
    }

    private function addLang(): void
    {
        (new AdmLngCtrl($this->db))->ajouter(new Form($_POST));
    }

    private function updLang(): void
    {
        $ctrl = new AdmLngCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->modifier($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

    private function delLang(): void
    {
        $ctrl = new AdmLngCtrl($this->db);
        if (array_key_exists('id', $this->params)) {
            $form = new Form($_POST);
            $ctrl->supprimer($this->params['id'], $form);
        } else {
            $ctrl->notFound();
        }
    }

}
