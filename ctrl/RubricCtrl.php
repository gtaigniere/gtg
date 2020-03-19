<?php

namespace Ctrl;

use Manager\LinkManager;
use Manager\RubricManager;
use PDO;

class RubricCtrl extends Controller
{
    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->rubricManager = new RubricManager($db);
        $this->linkManager = new LinkManager($db);
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
        if (!is_null($rubric)) {
            $links = $this->linkManager->findAllAsides($id, ['support', 'code', 'site-ext', 'menu-rubrique']);
            require_once ROOT_DIR . 'view/rubric/' . $rubric->getLabel() . '.php';
            require_once ROOT_DIR . 'view/template.php';
        } else {
            $this->notFound();
        }
    }

}