<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Html\Form;
use Manager\ContactManager;
use Model\Contact;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class ContactCtrl extends Controller
{
    /**
     * @var ContactManager
     */
    private $contactManager;

    /**
     * ContactCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->contactManager = new ContactManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $contacts = $this->contactManager->findAll();
//        $forms = [];
//        foreach($contacts as $contact) {
//            $forms[] = new Form($contact);
//        }
        require_once (ROOT_DIR . 'view/admin/contacts.php');
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
        $contact = new Contact();
        $contact->setFirstname($form->getValue('firstname'));
        $contact->setMail($form->getValue('mail'));
        $contact->setObject('object');
        $contact->setReceived('received');
        $contact->setMessage('message');
        if ($contact == null) {
            ErrorManager::add('Erreur lors de l\'ajout du message de contact !');
        } else {
            SuccessManager::add('Le message de contact a été ajouté avec succès.');
        }
        $this->all();
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->contactManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression du message de contact !');
        } else {
            SuccessManager::add('Le message de contact a été supprimé avec succès.');
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