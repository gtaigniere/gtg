<?php

namespace Ctrl;

use Form\ContactForm;

class HomeCtrl extends Controller
{

    /**
     * HomeCtrl constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return void
     */
    public function otherSites(): void
    {
        require_once ROOT_DIR . 'view/autres_sites.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    /**
     * @param ContactForm $contactForm
     * @return void
     */
    public function contact(ContactForm $contactForm): void
    {
        require_once ROOT_DIR . 'view/contact.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}