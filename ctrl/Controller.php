<?php

namespace Ctrl;

class Controller
{

    /**
     * @return void
     */
    public function notFound(): void
    {
        require_once ROOT_DIR . 'view/not_found.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    /**
     * @return void
     */
    public function unauthorizedAccess(): void
    {
        require_once ROOT_DIR . 'view/template.php';
    }

    /**
     * @return void
     */
    public function unauthorizedMethod(): void
    {
        require_once ROOT_DIR . 'view/template.php';
    }

}