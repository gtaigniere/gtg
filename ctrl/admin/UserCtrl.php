<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Form\UserForm;
use Html\Form;
use Manager\UserManager;
use Model\User;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class UserCtrl extends Controller
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
        $forms = [];
        foreach($users as $user) {
            $forms[] = new UserForm($user);
        }
        $formAddUser = new Form();
        require_once (ROOT_DIR . 'view/admin/users.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     */
    public function ajouter(Form $form): void
    {
        // Si le formulaire est validé
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form->getValue('validate') != null) {
                // Alors on persiste les données
                $this->add($form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $this->unauthorizedMethod();
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function modifier(int $id, Form $form): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Si le formulaire est validé
            if ($form->getValue('validate') != null) {
                // Alors on persiste les données
                $this->upd($id, $form);
            } else {
                $this->validate($form->getDatas());
            }
        } else {
            $this->unauthorizedMethod();
        }
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function supprimer(int $id, Form $form): void
    {
        // Si on est en POST et que c'est validé
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form->getValue('validate') != null) {
            // Alors on supprime les données
            $this->del($id);
        } else {
            $this->validate([]);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function add(Form $form): void
    {
        $user = new User();
        $user->setPseudo($form->getValue('pseudo'));
        $user->setEmail($form->getValue('email'));
        $user->setPwd(
            $form->getValue('pwd') != null ?
                $form->getValue('pwd') : 'default'
        );
        $user->setConfirmKey($form->getValue('confirmKey'));
        $user->setConfirmed(
            $form->getValue('confirmed') != null ?
                true : false
        );
        $user = $this->userManager->insert($user);
        if ($user == null) {
            ErrorManager::add('Erreur lors de l\'ajout de l\'utilisateur !');
        } else {
            SuccessManager::add('L\'utilisateur a été ajouté avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @param Form $form
     * @return void
     */
    public function upd(int $id, Form $form): void
    {
        $user = new User();
        $user->setPseudo($form->getValue('pseudo'));
        $user->setEmail($form->getValue('email'));
        $user->setPwd(
            $form->getValue('pwd') != null ?
                $form->getValue('pwd') : 'default'
        );
        $user->setConfirmKey($form->getValue('confirmKey'));
        $user->setConfirmed(
            $form->getValue('confirmed') != null ?
                true : false
        );
        $user->setIdUser($id);
        $user = $this->userManager->update($user);
        if ($user == null) {
            ErrorManager::add('Erreur lors de la modification de l\'utilisateur !');
        } else {
            SuccessManager::add('L\'utilisateur a été modifié avec succès.');
        }
        $this->all();
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
        $this->all();
    }

    /**
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once (ROOT_DIR . 'view/admin/validation.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}