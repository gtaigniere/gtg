<?php

namespace Ctrl\Admin;

use Manager\RubricManager;
use Manager\TypeManager;
use Model\Type;
use PDO;

class RubricCtrl
{
    /**
     * @var string
     */
    private $rubricManager;

    /**
     * @var string
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
     * @return void
     */
    public function all(): void
    {
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $rubric = $this->rubricManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Type $rubric
     * @return void
     */
    public function add(Type $rubric): void
    {
        $rubric = $this->rubricManager->insert($rubric);
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
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Type $rubric
     * @return void
     */
    public function upd(Type $rubric): void
    {
        $rubric = $this->rubricManager->update($rubric);
        require_once (ROOT_DIR . 'view/admin/typesandrubs.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}