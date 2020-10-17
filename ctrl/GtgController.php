<?php

namespace Ctrl;

use Core\Ctrl\Controller;

/**
 * Classe mère de tous nos contrôleurs pour le site GTG
 * @package Ctrl
 */
class GtgController extends Controller
{

    /**
     * GtgController constructor.
     * @param string $template
     */
    public function __construct(string $template = ROOT_DIR . 'view/template.php')
    {
        parent::__construct($template);
    }

    /**
     * Renvoie vers la page lorsqu'une ressource n'a pas été trouvée
     * @return void
     */
    public function notFound(): void
    {
        $this->render(ROOT_DIR . 'view/not_found.php', []);
    }

    /**
     * Renvoie vers la page lorsqu'un accès non autorisée est demandé
     * @return void
     */
    public function unauthorizedAccess(): void
    {
        $this->render('', []);
    }

    /**
     * Renvoie vers la page lorsqu'une requète utilise une méthode non autorisée
     * @return void
     */
    public function unauthorizedMethod(): void
    {
        $this->render('', []);
    }

}