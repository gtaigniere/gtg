<?php

namespace Ctrl\Admin;

use Exception;
use Html\Form;
use Manager\UserManager;
use Model\User;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class UserCtrl
{
    /**
     * @var UserManager
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
        require_once (ROOT_DIR . 'view/admin/users.php');
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
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function add(Form $form): void
    {
        $user = new User();
        $user->setPseudo($form->getValue('pseudo'));
        $user->setEmail($form->getValue('email'));
        $user->setPwd($form->getValue('pwd'));
        $user->setConfirmKey($form->getValue('confirmKey'));
        $user->setConfirmed($form->getValue('confirmed'));
        $user = $this->userManager->insert($user);
        if ($user == null) {
            ErrorManager::add('Erreur lors de l\'ajout de l\'utilisateur !');
        } else {
            SuccessManager::add('L\'utilisateur a été ajouté avec succès.');
        }
        $users = $this->userManager->findAll();
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
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression de l\'utilisateur !');
        } else {
            SuccessManager::add('L\'utilisateur a été supprimé avec succès.');
        }
        $users = $this->userManager->findAll();
        require_once (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function upd(Form $form): void
    {
        $user = new User();
        $user->setPseudo($form->getValue('pseudo'));
        $user->setEmail($form->getValue('email'));
        $user->setPwd($form->getValue('pwd'));
        $user->setConfirmKey($form->getValue('confirmKey'));
        $user->setConfirmed($form->getValue('confirmed'));
        $user->setIdUser($form->getValue('idUser'));
        $user = $this->userManager->update($user);
        if ($user == null) {
            ErrorManager::add('Erreur lors de la modification de l\'utilisateur !');
        } else {
            SuccessManager::add('L\'utilisateur a été modifié avec succès.');
        }
        $users = $this->userManager->findAll();
        require_once (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

}