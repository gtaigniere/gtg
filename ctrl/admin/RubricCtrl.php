<?php

require_once (ROOT_DIR . 'manager/RubricManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class RubricCtrl
{
    /**
     * @var string
     */
    private $rubricManager;

    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->rubricManager = new rubricManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $rubrics = $this->rubricManager->findAll();
        require (ROOT_DIR . 'view/admin/allRubrics.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $rubric = $this->rubricManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneRubric.php');
    }

    /**
     * @param Rubric $rubric
     * @return void
     */
    public function add(Rubric $rubric): void
    {
        $rubric = $this->rubricManager->insert($rubric);
        require_once (ROOT_DIR . 'view/admin/oneRubric.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->rubricManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listRubrics.php');
    }

    /**
     * @param Rubric $rubric
     * @return void
     */
    public function upd(Rubric $rubric): void
    {
        $rubric = $this->rubricManager->update($rubric);
        require_once (ROOT_DIR . 'view/admin/oneRubric.php');
    }

}