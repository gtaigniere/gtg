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

    public function otherSites(): void
    {
        require_once ROOT_DIR . 'view/autres_sites.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function contact(): void
    {
        require_once ROOT_DIR . 'view/contact.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}