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
    public function index(): void
    {
        $rubrics = $this->rubricManager->findAll();
        require ROOT_DIR . 'view/accueil.php';
        require ROOT_DIR . 'view/template.php';
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id): void
    {
        $rubric = $this->rubricManager->findOne($id);
        require_once ROOT_DIR . 'view/' . strtolower($rubric->getLibelle()) . '.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}