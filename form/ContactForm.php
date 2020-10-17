<?php

namespace Form;

use Core\Html\Form;
use Model\Message;

/**
 * Classe associée aux formulaires pour la classe Contact
 * @package Form
 */
class ContactForm extends Form
{
    /**
     * ContactForm constructor.
     * @param Message $contact
     */
    public function __construct(Message $contact)
    {
        parent::__construct();
        $this->add('id', $contact->getId());
        $this->add('firstname', $contact->getFirstname());
        $this->add('mail', $contact->getMail());
        $this->add('object', $contact->getObject());
        $this->add('received', $contact->getReceived()->format('d-m-Y H:i:s'));
        $this->add('message', $contact->getMessage());
    }
}
