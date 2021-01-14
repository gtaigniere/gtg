<?php

namespace Ctrl\Admin;

use Core\{
    Html\Form,
    Util\ErrorManager,
    Util\SuccessManager
};
use Exception\PourNotNumericException;
use Form\RecetteForm;
use Manager\RecetteManager;
use Model\Recette;
use PDO;

/**
 * Contrôleur associé à la section Admin/Recettes
 * @package Ctrl\Admin
 */
class RecetteCtrl extends AdminCtrl
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
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la liste des recettes
     * @return void
     */
    public function all(): void
    {
        $recettes = $this->recetteManager->findAll();
        $this->render(ROOT_DIR . 'view/admin/recettes.php', compact('recettes'));
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
            $this->render(ROOT_DIR . 'view/admin/recette.php', compact('form'));
        }
    }

    /**
     * Renvoi sur le formulaire de recette dans le cas d'un problème de saisie
     * Les valeurs incorrectes doivent être au préalable supprimées du formulaire transmis
     * @param Form $form Les valeurs de ce formulaire seront présentés dans le formulaire HTML
     */
    public function modifierAvantAjouter(Form $form)
    {
        $this->render(ROOT_DIR . 'view/admin/recette.php', compact('form'));
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     * @throws PourNotNumericException
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
                $this->render(ROOT_DIR . 'view/admin/recette.php', compact('recette', 'form'));
            } else {
                $this->notFound();
            }
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     * @throws PourNotNumericException
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

}
