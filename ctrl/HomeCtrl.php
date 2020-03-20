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

    public function inscription()
    {
        require_once ROOT_DIR . 'view/inscription.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function connexion()
    {
        require_once ROOT_DIR . 'view/connexion.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function deco()
    {
        session_destroy();
        header('Location: index.php');
    }

    public function contact()
    {
        require_once ROOT_DIR . 'view/contact.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}