<?php

require_once ROOT_DIR . 'ctrl/Controller.php';

class DefaultCtrl extends Controller
{

    /**
     * DefaultCtrl constructor.
     */
    public function __construct()
    {
    }

    public function vietnam()
    {
        require_once ROOT_DIR . 'view/vietnam.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function otherSites()
    {
        require_once ROOT_DIR . 'view/autres_sites.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function contact()
    {
        require_once ROOT_DIR . 'view/contact.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}