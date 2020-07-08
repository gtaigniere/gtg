<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use DateTime;
use Form\ContactForm;
use Form\ResponseForm;
use Html\Form;
use Manager\MessageManager;
use Model\Message;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class ContactCtrl extends Controller
{
    /**
     * @var MessageManager
     */
    private $contactManager;

    /**
     * ContactCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->contactManager = new MessageManager($db);
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
     * @param $id
     * @return Message|null
     */
    public function one($id): ?Message
    {
        return $this->contactManager->findOne($id);
    }

    /**
     * @param int $id
     */
    public function repondre(int $id)
    {
        $messageContact = $this->one($id);
        $form = new ResponseForm($messageContact);
        require_once (ROOT_DIR . 'view/admin/reply.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     */
    public function envRep(Form $form)
    {
        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:"gtg.fr"'."\n";
        $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
        $header .= 'Content-Transfer-Encoding: 8bit';
        mail($form->getValue('mail'), $form->getValue('object'), $form->getValue('message'), $header);
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
        $contact = new Message();
        $contact->setFirstname($form->getValue('firstname'));
        $contact->setMail($form->getValue('mail'));
        $contact->setObject($form->getValue('object'));
        $contact->setReceived(new DateTime());
        $contact->setMessage($form->getValue('message'));
        $this->contactManager->insert($contact);
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