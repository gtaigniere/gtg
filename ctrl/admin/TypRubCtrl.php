<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\RubricForm;
use Form\TypeForm;
use Html\Form;
use Manager\TypeManager;
use Manager\RubricManager;
use PDO;

class TypRubCtrl extends Controller
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
    }

    /**
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