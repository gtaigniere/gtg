<?php


abstract class Controller
{

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    public function notFound()
    {
        require_once ROOT_DIR . 'view/not_found.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}