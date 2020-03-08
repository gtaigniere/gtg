<?php

require_once (ROOT_DIR . 'manager/UserManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class UserCtrl extends Controller
{
    /**
     * @var string
     */
    private $userManager;

    /**
     * UserCtrl constructor.
     */
    public function __construct()
    {
        $this->userManager = new userManager(new MyPdo());
    }

    /**
     * @return array
     */
    public function all(): ?
    {
        $users = $this->userManager->findAll();
        require (ROOT_DIR . 'view/admin/allUsers.php');
    }

    /**
     * @param int $id
     */
    public function one(int $id): ?
    {
        $user = $this->userManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneUser.php');
    }

    /**
     * @param User $user
     */
    public function add(User $user): ?
    {
        $user = $this->userManager->insert($user);
        require_once (ROOT_DIR . 'view/admin/oneUser.php');
    }

    /**
     * @param int $id
     */
    public function del(int $id): ?
    {
        $result = $this->userManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listUsers.php');
    }

    /**
     * @param User $user
     */
    public function upd(User $user): ?
    {
        $user = $this->userManager->update($user);
        require_once (ROOT_DIR . 'view/admin/oneUser.php');
    }

}