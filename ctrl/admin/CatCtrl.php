<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Html\Form;
use Manager\CatManager;
use Model\Cat;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class CatCtrl extends Controller
{
    /**
     * @var CatManager
     */
    private $catManager;

    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->catManager = new catManager($db);
    }

    /**
     * @param Cat $cat
     * @return Form
     */
    public function catToForm(Cat $cat): Form
    {
        $form = new Form();
        $form->add('idCat', $cat->getIdCat());
        $form->add('label', $cat->getLabel());
        return $form;
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
        $cat = new Cat();
        $cat->setLabel($form->getValue('label'));
        $obj = $this->catManager->insert($cat);
        if ($obj == null) {
            ErrorManager::add('Erreur lors de l\'ajout de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été ajouté avec succès.');
        }
        $cats = $this->catManager->findAll();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $cat = new Cat();
        $cat->setLabel($form->getValue('label'));
        $obj = $this->catManager->update($cat);
        if ($obj == null) {
            ErrorManager::add('Erreur lors de la modification de la catégorie !');
        } else {
            SuccessManager::add('La catégorie a été modifié avec succès.');
        }
        $cats = $this->catManager->findAll();
        require_once (ROOT_DIR . 'view/admin/catsandlangs.php');
        require_once (ROOT_DIR . 'view/template-snip.php');
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
        $cats = $this->catManager->findAll();
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