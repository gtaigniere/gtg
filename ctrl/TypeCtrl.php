<?php

require_once (ROOT_DIR . 'manager/TypeManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

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
        require (ROOT_DIR . 'view/allTypes.php');
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

}