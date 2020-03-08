<?php

require_once (ROOT_DIR . 'manager/TypeManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class TypeCtrl extends Controller
{
    /**
     * @var string
     */
    private $typeManager;

    /**
     * TypeCtrl constructor.
     */
    public function __construct()
    {
        $this->typeManager = new typeManager(new MyPdo());
    }

    /**
     * @return array
     */
    public function all(): ?
    {
        $types = $this->typeManager->findAll();
        require (ROOT_DIR . 'view/allTypes.php');
    }

    /**
     * @param int $id
     */
    public function one(int $id): ?
    {
        $type = $this->typeManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

}