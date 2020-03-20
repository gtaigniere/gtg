<?php

namespace Ctrl;

abstract class Controller
{

    public function notFound()
    {
        require_once ROOT_DIR . 'view/not_found.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}