<?php

namespace Ctrl;

class Controller
{

    public function notFound(): void
    {
        require_once ROOT_DIR . 'view/not_found.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function unauthorizedAccess(): void
    {
        require_once ROOT_DIR . 'view/template.php';
    }

    public function unauthorizedMethod(): void
    {
        require_once ROOT_DIR . 'view/template.php';
    }
}