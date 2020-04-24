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

    /**
     * @return void
     */
    public function otherSites(): void
    {
        require_once ROOT_DIR . 'view/autres_sites.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    /**
     * @return void
     */
    public function contact(): void
    {
        require_once ROOT_DIR . 'view/contact.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}