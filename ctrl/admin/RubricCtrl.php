<?php

namespace Ctrl\Admin;

use Core\{
    Html\Form,
    Util\ErrorManager,
    Util\SuccessManager
};
use Model\Rubric;
use PDO;

/**
 * Contrôleur associé à la section Admin/Rubriques
 * @package Ctrl\Admin
 */
class RubricCtrl extends TypRubCtrl
{
    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
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
                // Alors on persiste les données
                $this->add($form);
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
    public function modifier(int $id, Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Si le formulaire est validé
            if ($form->getValue('validate') != null) {
                // Alors on persiste les données
                $this->upd($id, $form);
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
        $rubric = new Rubric();
        $rubric->setLabel($form->getValue('label'));
        $rubric->setImage($form->getValue('image'));
        $rubric = $this->rubricManager->insert($rubric);
        if ($rubric == null) {
            ErrorManager::add('Erreur lors de l\'ajout de la rubrique !');
        } else {
            SuccessManager::add('La rubrique a été ajouté avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function upd(int $id, Form $form): void
    {
        $rubric = new Rubric();
        $rubric->setLabel($form->getValue('label'));
        $rubric->setImage($form->getValue('image'));
        $rubric->setIdRub($id);
        $rubric = $this->rubricManager->update($rubric);
        if ($rubric == null) {
            ErrorManager::add('Erreur lors de la modification de la rubrique !');
        } else {
            SuccessManager::add('La rubrique a été modifié avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->rubricManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression de la rubrique !');
        } else {
            SuccessManager::add('La rubrique a été supprimé avec succès.');
        }
        $this->all();
    }

}
