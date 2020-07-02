<?php

namespace Form;

use Html\Form;
use Model\Contact;

class ContactForm extends Form
{
    /**
     * ContactForm constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        parent::__construct();
        $this->add('id', $contact->getIdCont());
        $this->add('firstname', $contact->getFirstname());
        $this->add('mail', $contact->getMail());
        $this->add('object', $contact->getObject());
        $this->add('received', $contact->getReceived()->format('d-m-Y H:i:s'));
        $this->add('message', $contact->getMessage());
    }
}
