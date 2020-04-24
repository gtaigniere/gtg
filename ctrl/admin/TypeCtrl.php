<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
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
     * @param Type $type
     * @return Form
     */
    public function typeToForm(Type $type): Form
    {
        $form = new Form();
        $form->add('idType', $type->getIdType());
        $form->add('label', $type->getLabel());
        return $form;
    }

    /**
     * @param Form $form
     * @return void
     */
    public function ajouter(Form $form): void
    {
        // Si le formulaire est validé
        if (isset($_POST['validate'])) {
            // Alors on persiste les données
            $this->add($form);
        } else {
            $this->validate($_POST);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function modifier(Form $form): void
    {
        // Si le formulaire est validé
        if (isset($_POST['validate'])) {
            // Alors on persiste les données
            $this->upd($form);
        } else {
            $this->validate($_POST);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function supprimer(Form $form): void
    {
        // Si on est en POST et que c'est validé
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form->getValue('validate') != null) {
            // Alors on supprime les données
            $this->del($form->getValue('idType'));
        } else {
            $this->validate(['idType' => $form->getValue('idType')]);
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
        $rubrics = $this->rubricManager->findAll();
        require_once(ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    private function upd(Form $form): void
    {
        $type = new Type();
        $type->setLabel($form->getValue('label'));
        $type->setIdType($form->getValue('idType'));
        $type = $this->typeManager->update($type);
        if ($type == null) {
            ErrorManager::add('Erreur lors de la modification du type !');
        } else {
            SuccessManager::add('Le type a été modifié avec succès.');
        }
        $types = $this->typeManager->findAll();
        $rubrics = $this->rubricManager->findAll();
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
        $rubrics = $this->rubricManager->findAll();
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