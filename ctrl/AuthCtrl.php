<?php

namespace Ctrl;

use Manager\UserManager;
use PDO;

/**
 * Contrôleur associé aux sections Inscription et Connexion
 * @package Ctrl
 */
class AuthCtrl extends GtgController
{
    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * AuthCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->userManager = new UserManager($db);
        parent::__construct(ROOT_DIR . 'view/template.php');
    }
    /**
     * Affiche le formulaire de connexion
     * @return void
     */
    public function loginForm(): void
    {
        $this->render('view/connexion.php', []);
    }

    /**
     * @param string $pseudo
     * @param string $pwd
     * @return void
     */
    public function login(string $pseudo, string $pwd): void
    {
        // Effectuer la vérification et la connexion
        if ($loginOk) {
            $_SESSION['auth']['pseudo'] = $pseudo;
            header("Location: index.php");
        } else {
            $this->loginForm();
        }
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        session_destroy();
        $this->render('view/logout.php', []);
    }

    /**
     * @return void
     */
    public function subscribe()
    {
        $this->render('view/inscription.php', []);
    }

}
