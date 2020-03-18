<?php

namespace Ctrl;

use Manager\TypeManager;
use PDO;

/*
require_once ROOT_DIR . 'ctrl/Controller.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'manager/TypeManager.php';
*/

class TypeCtrl extends Controller
{
    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * TypeCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->typeManager = new TypeManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $types = $this->typeManager->findAll();
        require (ROOT_DIR . 'view/allTypes.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $type = $this->typeManager->findOne($id);
        require_once (ROOT_DIR . 'view/oneType.php');
    }

}