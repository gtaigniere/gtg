<?php

namespace Ctrl\Admin;

use Form\{
    RubricForm,
    TypeForm
};
use Core\Html\Form;
use Manager\{
    TypeManager,
    RubricManager
};
use PDO;

/**
 * Contrôleur associé à la section Admin/Types et Admin/Rubriques
 * @package Ctrl\Admin
 */
class TypRubCtrl extends AdminCtrl
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
     * Affiche la liste des rubriques et des types
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

}
