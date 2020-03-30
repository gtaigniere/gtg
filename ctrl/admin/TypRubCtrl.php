<?php

namespace Ctrl\Admin;

use Exception;
use Html\Form;
use Manager\TypeManager;
use Manager\RubricManager;
use Model\Type;
use Model\Rubric;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class TypRubCtrl
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
        $this->rubricManager = new rubricManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $types = $this->typeManager->findAll();
        $rubrics = $this->rubricManager->findAll();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function oneType(int $id): void
    {
        $type = $this->typeManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function oneRub(int $id): void
    {
        $rubric = $this->rubricManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function addType(Form $form): void
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
     * @throws Exception
     */
    public function addRubric(Form $form): void
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
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once(ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function delType(int $id): void
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
     * @param int $id
     * @return void
     */
    public function delRubric(int $id): void
    {
        $result = $this->rubricManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression de la rubrique !');
        } else {
            SuccessManager::add('La rubrique a été supprimé avec succès.');
        }
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function updType(Form $form): void
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
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function updRubric(Form $form): void
    {
        $rubric = new Rubric();
        $rubric->setLabel($form->getValue('label'));
        $rubric->setImage($form->getValue('image'));
        $rubric->setIdRub($form->getValue('idRub'));
        $rubric = $this->rubricManager->update($rubric);
        if ($rubric == null) {
            ErrorManager::add('Erreur lors de la modification de la rubrique !');
        } else {
            SuccessManager::add('La rubrique a été modifié avec succès.');
        }
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }


}