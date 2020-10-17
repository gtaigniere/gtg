<?php

namespace Form;

use Core\Html\Form;
use Model\Message;

/**
 * Représente un formulaire de réponse contenant les informations
 * reçues depuis le message de contact et comprenant les champs suivants :
 * mail => adresse mail du contact
 * object => sujet du message initial avec le préfixe 'rep->'
 * message => prénom du contact, sujet du message initial, message initial
 * @package Form
 */
class ResponseForm extends Form
{

    /**
     * ResponseForm constructor.
     * @param Message $contact
     */
    public function __construct(Message $contact)
    {
        $datas = [
            'mail' => $contact->getMail(),
            'object' => 'rep->' . $contact->getObject(),
            'message' => $contact->getFirstname() . PHP_EOL .
            $contact->getReceived()->format('Y-m-d H:i') . PHP_EOL .
            $contact->getMessage() . PHP_EOL
        ];
        parent::__construct($datas);
    }

}