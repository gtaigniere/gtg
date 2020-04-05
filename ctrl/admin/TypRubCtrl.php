<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Manager\TypeManager;
use Manager\RubricManager;
use PDO;

class TypRubCtrl extends Controller
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

}