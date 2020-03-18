<?php

namespace Ctrl\Admin;

use Manager\TypeManager;
use PDO;

/*
require_once (ROOT_DIR . 'config/MyPdo.php');
require_once (ROOT_DIR . 'manager/TypeManager.php');
*/

class TypeCtrl
{
    /**
     * @var string
     */
    private $typeManager;

    /**
     * TypeCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->typeManager = new typeManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $types = $this->typeManager->findAll();
        require (ROOT_DIR . 'view/admin/listTypes.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $type = $this->typeManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

    /**
     * @param Type $type
     * @return void
     */
    public function add(Type $type): void
    {
        $type = $this->typeManager->insert($type);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->typeManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listTypes.php');
    }

    /**
     * @param Type $type
     * @return void
     */
    public function upd(Type $type): void
    {
        $types = $this->typeManager->update($type);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

}