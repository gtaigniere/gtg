<?php

require_once (ROOT_DIR . 'manager/RubricManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class RubricCtrl extends Controller
{
    /**
     * @var string
     */
    private $rubricManager;

    /**
     * RubricCtrl constructor.
     */
    public function __construct()
    {
        $this->rubricManager = new rubricManager(new MyPdo());
    }

    /**
     * @return array
     */
    public function all(): ?
    {
        $rubrics = $this->rubricManager->findAll();
        require (ROOT_DIR . 'view/admin/allRubrics.php');
    }

    /**
     * @param int $id
     */
    public function one(int $id): ?
    {
        $rubric = $this->rubricManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneRubric.php');
    }

    /**
     * @param Rubric $rubric
     */
    public function add(Rubric $rubric): ?
    {
        $rubric = $this->rubricManager->insert($rubric);
        require_once (ROOT_DIR . 'view/admin/oneRubric.php');
    }

    /**
     * @param int $id
     */
    public function del(int $id): ?
    {
        $result = $this->rubricManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listRubrics.php');
    }

    /**
     * @param Rubric $rubric
     */
    public function upd(Rubric $rubric): ?
    {
        $rubric = $this->rubricManager->update($rubric);
        require_once (ROOT_DIR . 'view/admin/oneRubric.php');
    }

}