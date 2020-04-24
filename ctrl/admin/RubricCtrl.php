<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Html\Form;
use Manager\RubricManager;
use Manager\TypeManager;
use Model\Rubric;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class RubricCtrl extends Controller
{
    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->rubricManager = new rubricManager($db);
        $this->typeManager = new typeManager($db);
    }

    /**
     * @param Rubric $rubric
     * @return Form
     */
    public function rubricToForm(Rubric $rubric): Form
    {
        $form = new Form();
        $form->add('idRub', $rubric->getIdRub());
        $form->add('label', $rubric->getLabel());
        $form->add('image', $rubric->getImage());
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
        }
        // Sinon on le valide
        else {
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
        } // Sinon on le valide
        else {
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
            $this->del($form->getValue('idRub'));
        } // Sinon on le valide
        else {
            $this->validate(['idRub' => $form->getValue('idRub')]);
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
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once(ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
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
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param array $datas
     */
    public function validate(array $datas): void
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

}