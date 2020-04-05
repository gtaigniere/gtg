<?php

namespace Ctrl;

use Manager\UserManager;
use PDO;

class UserCtrl extends Controller
{
    /**
     * @var string
     */
    private $userManager;

    /**
     * UserCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->userManager = new userManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $users = $this->userManager->findAll();
        require (ROOT_DIR . 'view/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $user = $this->userManager->findOne($id);
        require_once (ROOT_DIR . 'view/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}