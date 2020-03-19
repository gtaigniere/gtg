<?php

namespace Ctrl;

use Manager\LinkManager;
use PDO;

class LinkCtrl extends Controller
{
    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new LinkManager($db);
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