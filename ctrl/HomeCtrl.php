<?php

namespace Ctrl;

class HomeCtrl extends Controller
{

    /**
     * HomeCtrl constructor.
     */
    public function __construct()
    {
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