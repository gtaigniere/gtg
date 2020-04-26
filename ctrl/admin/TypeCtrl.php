<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\RubricForm;
use Form\TypeForm;
use Html\Form;
use Manager\RubricManager;
use Manager\TypeManager;
use Model\Type;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class TypeCtrl extends Controller
{
    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * TypeCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->typeManager = new TypeManager($db);
        $this->rubricManager = new RubricManager($db);
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
     * @param Form $form
     * @return void
     */
    public function modifier(Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Si le formulaire est validé
            if ($form->getValue('validate') != null) {
                // Alors on persiste les données
                $this->upd($form);
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
        $types = $this->typeManager->findAll();
        $typeForms = [];
        foreach($types as $type) {
            $typeForms[] = new TypeForm($type);
        }
        $formAddType = new Form();
        $rubrics = $this->rubricManager->findAll();
        $rubForms = [];
        foreach($rubrics as $rubric) {
            $rubForms[] = new RubricForm($rubric);
        }
        $formAddRub = new Form();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    private function upd(Form $form): void
    {
        $type = new Type();
        $type->setLabel($form->getValue('label'));
        $type->setIdType($form->getValue('id'));
        $type = $this->typeManager->update($type);
        if ($type == null) {
            ErrorManager::add('Erreur lors de la modification du type !');
        } else {
            SuccessManager::add('Le type a été modifié avec succès.');
        }
        $types = $this->typeManager->findAll();
        $typeForms = [];
        foreach($types as $type) {
            $typeForms[] = new TypeForm($type);
        }
        $formAddType = new Form();
        $rubrics = $this->rubricManager->findAll();
        $rubForms = [];
        foreach($rubrics as $rubric) {
            $rubForms[] = new RubricForm($rubric);
        }
        $formAddRub = new Form();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
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
        $formAddType = new Form();
        $rubrics = $this->rubricManager->findAll();
        $rubForms = [];
        foreach($rubrics as $rubric) {
            $rubForms[] = new RubricForm($rubric);
        }
        $formAddRub = new Form();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
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