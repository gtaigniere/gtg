<?php

namespace Ctrl\Admin;

use Core\{
    Html\Form,
    Util\ErrorManager,
    Util\SuccessManager
};
use Form\TypeForm;
use Model\Type;
use PDO;

/**
 * Contrôleur associé à la section Admin/Types
 * @package Ctrl\Admin
 */
class TypeCtrl extends TypRubCtrl
{
    /**
     * TypeCtrl constructor.
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
    private function add(Form $form): void
    {
        $type = new Type();
        $type->setLabel($form->getValue('label'));
        $type = $this->typeManager->insert($type);
        if ($type == null) {
            ErrorManager::add('Erreur lors de l\'ajout du type !');
        } else {
            SuccessManager::add('Le type a été ajouté avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    private function upd(int $id, Form $form): void
    {
        $type = new Type();
        $type->setLabel($form->getValue('label'));
        $type->setIdType($id);
        $type = $this->typeManager->update($type);
        if ($type == null) {
            ErrorManager::add('Erreur lors de la modification du type !');
        } else {
            SuccessManager::add('Le type a été modifié avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->typeManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression du type !');
        } else {
            SuccessManager::add('Le type a été supprimé avec succès.');
        }
        $types = $this->typeManager->findAll();
        $typeForms = [];
        foreach($types as $type) {
            $typeForms[] = new TypeForm($type);
        }
        $this->all();
    }

}
