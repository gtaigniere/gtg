<?php

namespace Ctrl\Admin;

use Core\{
    Html\Form,
    Util\ErrorManager,
    Util\SuccessManager
};
use Model\Cat;
use PDO;

/**
 * Contrôleur associé à la section Admin/Catégories
 * @package Ctrl\Admin
 */
class CatCtrl extends CatLangCtrl
{
    /**
     * CatCtrl constructor.
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
        $cat = new Cat();
        $cat->setLabel($form->getValue('label'));
        $cat = $this->catManager->insert($cat);
        if ($cat == null) {
            ErrorManager::add('Erreur lors de l\'ajout de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été ajouté avec succès.');
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
        $cat = new Cat();
        $cat->setLabel($form->getValue('label'));
        $cat->setIdCat($id);
        $cat = $this->catManager->update($cat);
        if ($cat == null) {
            ErrorManager::add('Erreur lors de la modification de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été modifié avec succès.');
        }
        $this->all();
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
        $this->all();
    }

}
