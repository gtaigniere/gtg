<?php

namespace Ctrl;

use Core\Html\Form;

/**
 * Class HomeCtrl
 * Contrôleur associé aux liens "Autres sites" et "Contact" de la page d'accueil
 * @package Ctrl
 */
class HomeCtrl extends GtgController
{

    /**
     * HomeCtrl constructor.
     */
    public function __construct()
    {
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la page des liens vers d'autres sites
     * @return void
     */
    public function otherSites(): void
    {
        $this->render(ROOT_DIR . 'view/autres_sites.php', []);
    }

    /**
     * Affiche la page du formulaire de contact
     * @param Form $form
     * @return void
     */
    public function contact(Form $form): void
    {
        $this->render(ROOT_DIR . 'view/contact.php', compact('form'));
    }

}