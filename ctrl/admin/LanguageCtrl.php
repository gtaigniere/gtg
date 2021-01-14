<?php

namespace Ctrl\Admin;

use Core\{
    Html\Form,
    Util\ErrorManager,
    Util\SuccessManager
};
use Model\Language;
use PDO;

/**
 * Contrôleur associé à la section Admin/Langages
 * @package Ctrl\Admin
 */
class LanguageCtrl extends CatLangCtrl
{
    /**
     * LanguageCtrl constructor.
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
            if ($form->getValue('validate') != null) {
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
        $language = new Language();
        $language->setLabel($form->getValue('label'));
        $language = $this->languageManager->insert($language);
        if ($language == null) {
            ErrorManager::add('Erreur lors de l\'ajout du language !');
        } else {
            SuccessManager::add('Le language a été ajouté avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function upd(int$id, Form $form): void
    {
        $language = new Language();
        $language->setLabel($form->getValue('label'));
        $language->setIdLang($id);
        $language = $this->languageManager->update($language);
        if ($language == null) {
            ErrorManager::add('Erreur lors de la modification du language !');
        } else {
            SuccessManager::add('Le language a été modifié avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->languageManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression du language !');
        } else {
            SuccessManager::add('Le language a été supprimé avec succès.');
        }
        $this->all();
    }

}
