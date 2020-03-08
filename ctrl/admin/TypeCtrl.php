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
        require (ROOT_DIR . 'view/admin/allTypes.php');
    }

    /**
     * @param int $id
     */
    public function one(int $id): ?
    {
        $type = $this->typeManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

    /**
     * @param Type $type
     */
    public function add(Type $type): ?
    {
        $type = $this->typeManager->insert($type);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

    /**
     * @param int $id
     */
    public function del(int $id): ?
    {
        $result = $this->typeManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listTypes.php');
    }

    /**
     * @param Type $type
     */
    public function upd(Type $type): ?
    {
        $types = $this->typeManager->update($type);
        require_once (ROOT_DIR . 'view/admin/oneType.php');
    }

}