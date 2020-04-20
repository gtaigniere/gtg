<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Html\Form;
use Manager\LanguageManager;
use Model\Language;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class LanguageCtrl extends Controller
{
    /**
     * @var LanguageManager
     */
    private $languageManager;

    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->languageManager = new LanguageManager($db);
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
     * @param Form $form
     * @return void
     */
    public function modifier(Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->upd($form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $this->unauthorizedMethod();
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function supprimer(Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                $this->del($form->getValue('idRub'));
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $this->unauthorizedMethod();
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
        $obj = $this->languageManager->insert($language);
        if ($obj == null) {
            ErrorManager::add('Erreur lors de l\'ajout du language !');
        } else {
            SuccessManager::add('Le language a été ajouté avec succès.');
        }
        $languages = $this->languageManager->findAll();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $language = new Language();
        $language->setLabel($form->getValue('label'));
        $obj = $this->languageManager->update($language);
        if ($obj == null) {
            ErrorManager::add('Erreur lors de la modification du language !');
        } else {
            SuccessManager::add('Le language a été modifié avec succès.');
        }
        $languages = $this->languageManager->findAll();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
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
        $languages = $this->languageManager->findAll();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param array $datas
     * @return void
     */
    public function validate(array $datas): void
    {
        // Vérifier le type des variables
        require_once (ROOT_DIR . 'view/admin/validation.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}