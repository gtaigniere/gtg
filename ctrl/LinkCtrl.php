<?php

require_once ROOT_DIR . 'ctrl/Controller.php';
require_once (ROOT_DIR . 'manager/LinkManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class LinkCtrl extends Controller
{
    /**
     * @var string
     */
    private $linkManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new linkManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $links = $this->linkManager->findAll();
        require (ROOT_DIR . 'view/allLinks.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        require_once (ROOT_DIR . 'view/oneLink.php');
    }

}