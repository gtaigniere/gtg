<?php

namespace Ctrl\Admin;

use Manager\UserManager;
use Model\User;
use PDO;

class UserCtrl
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
        require (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $user = $this->userManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param User $user
     * @return void
     */
    public function add(User $user): void
    {
        $user = $this->userManager->insert($user);
        require_once (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->userManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param User $user
     * @return void
     */
    public function upd(User $user): void
    {
        $user = $this->userManager->update($user);
        require_once (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}