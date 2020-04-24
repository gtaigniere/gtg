<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\RecetteForm;
use Html\Form;
use Manager\RecetteManager;
use Model\Recette;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class RecetteCtrl extends Controller
{
    /**
     * @var string
     */
    private $recetteManager;

    /**
     * RecetteCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->recetteManager = new recetteManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $recettes = $this->recetteManager->findAll();
        require(ROOT_DIR . 'view/admin/recettes.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
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
            require_once(ROOT_DIR . 'view/admin/recette.php');
            require_once(ROOT_DIR . 'view/template.php');
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
            $recette = $this->recetteManager->findOne($id);
            if ($recette != null) {
                $form = new RecetteForm($recette);
                require_once ROOT_DIR . 'view/admin/recette.php';
                require_once ROOT_DIR . 'view/template.php';
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form->getValue('validate') != null) {
            $this->del($id);
        } else {
            $recette = $this->recetteManager->findOne($id);
            if ($recette != null) {
                $form = new RecetteForm($recette);
                $this->validate($form->getDatas());
            } else {
                $this->notFound();
            }
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function add(Form $form): void
    {
        $recette = new Recette();
        $recette->setLabel($form->getValue('label'));
        $recette->setInfos($form->getValue('infos'));
        $recette->setPour($form->getValue('pour'));
        $recette->setIngredient($form->getValue('ingredient'));
        $recette->setPhoto($form->getValue('photo'));
        $recette->setDetail($form->getValue('detail'));
        $recette = $this->recetteManager->insert($recette);
        if ($recette == null) {
            ErrorManager::add('Erreur lors de l\'ajout de la recette !');
        } else {
            SuccessManager::add('La recette a été ajouté avec succès.');
        }
        $this->all();
    }

    /**
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $recette = new Recette();
        $recette->setLabel($form->getValue('label'));
        $recette->setInfos($form->getValue('infos'));
        $recette->setPour($form->getValue('pour'));
        $recette->setIngredient($form->getValue('ingredient'));
        $recette->setPhoto($form->getValue('photo'));
        $recette->setDetail($form->getValue('detail'));
        $recette->setIdRec($form->getValue('id'));
        $recette = $this->recetteManager->update($recette);
        if ($recette == null) {
            ErrorManager::add('Erreur lors de la modification de la recette !');
        } else {
            SuccessManager::add('La recette a été modifié avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->recetteManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression de la recette !');
        } else {
            SuccessManager::add('La recette a été supprimé avec succès.');
        }
        $this->all();
    }

    /**
     * @param array $datas
     * @return void
     */
    public function validate(array $datas): void
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

}