<?php

namespace Ctrl;

use Manager\UserManager;
use PDO;

/**
 * Contrôleur associé à la section Utilisateurs
 * @package Ctrl
 */
class UserCtrl extends GtgController
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
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche tous les utilisateurs
     * @return void
     */
    public function all(): void
    {
        $users = $this->userManager->findAll();
        $this->render('', compact('users'));
    }

    /**
     * Affiche l'utilisateur dont l'id est passé en paramètre
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $user = $this->userManager->findOne($id);
        $this->render('', compact('user'));
    }

}
