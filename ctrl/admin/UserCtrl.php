<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
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
     * @param User $user
     * @return Form
     */
    public function userToForm(User $user): Form
    {
        $form = new Form();
        $form->add('idUser', $user->getIdUser());
        $form->add('pseudo', $user->getPseudo());
        $form->add('email', $user->getEmail());
        $form->add('pwd', $user->getPwd());
        $form->add('confirmKey', $user->getConfirmKey());
        $form->add('confirmed', $user->isConfirmed());
        return $form;
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
     * @param Form $form
     * @return void
     */
    public function ajouter(Form $form): void
    {
        // Si le formulaire est validé
        if (isset($_POST['validate'])) {
            // Alors on persiste les données
            $this->add($form);
        } else {
            $this->validate($_POST);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function modifier(Form $form): void
    {
        // Si le formulaire est validé
        if (isset($_POST['validate'])) {
            // Alors on persiste les données
            $this->upd($form);
        } else {
            $this->validate($_POST);
        }
    }

    /**
     * @param Form $form
     * @return void
     */
    public function supprimer(Form $form): void
    {
        // Si on est en POST et que c'est validé
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form->getValue('validate') != null) {
            // Alors on supprime les données
            $this->del($form->getValue('idUser'));
        } else {
            $this->validate(['idUser' => $form->getValue('idUser')]);
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
        $user->setPwd($form->getValue('pwd'));
        $user->setConfirmKey($form->getValue('confirmKey'));
        $user->setConfirmed(
            $form->getValue('confirmed') != null ? $form->getValue('confirmed') : false
        );
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
     * @param Form $form
     * @return void
     */
    public function upd(Form $form): void
    {
        $user = new User();
        $user->setPseudo($form->getValue('pseudo'));
        $user->setEmail($form->getValue('email'));
        $user->setPwd($form->getValue('pwd'));
        $user->setConfirmKey($form->getValue('confirmKey'));
        $user->setConfirmed(
            $form->getValue('confirmed') != null ? true : false
        );
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
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

}