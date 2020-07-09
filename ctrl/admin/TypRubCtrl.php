<?php

namespace Ctrl\Admin;

use Ctrl\GtgController;
use Form\RubricForm;
use Form\TypeForm;
use Html\Form;
use Manager\TypeManager;
use Manager\RubricManager;
use PDO;

/**
 * Class TypRubCtrl
 * Contrôleur associé à la section Admin/Types et Admin/Rubriques
 * @package Ctrl\Admin
 */
class TypRubCtrl extends GtgController
{
    /**
     * @var TypeManager
     */
    protected $typeManager;

    /**
     * @var RubricManager
     */
    protected $rubricManager;

    /**
     * TypeCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->typeManager = new TypeManager($db);
        $this->rubricManager = new RubricManager($db);
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la page de la liste des rubriques et des types
     * @return void
     */
    public function all(): void
    {
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
        $this->render(ROOT_DIR . 'view/admin/typesandrubs.php',
            compact('types', 'typeForms', 'formAddType',
                'rubrics', 'rubForms', 'formAddRub'));
    }

    /**
     * Affiche la page de validation d'ajout, de modification, et de suppression
     * @param array $datas
     * @return void
     */
    public function validate(array $datas): void
    {
        // Vérifier le type des variables
        $this->render(ROOT_DIR . 'view/admin/validation.php', compact('datas'));
    }

}