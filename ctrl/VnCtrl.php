<?php

namespace Ctrl;

use Manager\LinkManager;
use Manager\PhotoManager;
use Manager\RecetteManager;
use Manager\VnManager;
use PDO;

/**
 * Class VnCtrl
 * Contrôleur associé à la section Vietnam
 * @package Ctrl
 */
class VnCtrl extends GtgController
{
    /**
     * @var VnManager
     */
    private $vnManager;

    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * @var PhotoManager
     */
    private $photoManager;

    /**
     * @var RecetteManager
     */
    private $recetteManager;

    /**
     * VnCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->vnManager = new VnManager($db);
        $this->linkManager = new LinkManager($db);
        $this->photoManager = new PhotoManager($db);
        $this->recetteManager = new RecetteManager($db);
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la page d'accueil de la section Vietnam
     * @return void
     */
    public function home(): void
    {
        $recettes = $this->recetteManager->findAll();
        $links = $this->linkManager->findAsidesByLabelRub('vietnam' ,['site-ext', 'menu-rubrique']);
        $this->render(ROOT_DIR . 'view/vietnam.php', compact('recettes', 'links'));
    }

    /**
     * Affiche la page de la galerie
     * @return void
     */
    public function galerie(): void
    {
        $recettes = $this->recetteManager->findAll();
        $photos = $this->photoManager->findAll();
        $links = $this->linkManager->findAsidesByLabelRub('vietnam', ['site-ext', 'menu-rubrique']);
        $this->render(ROOT_DIR . 'view/galerie.php', compact('recettes', 'photos', 'links'));
    }

}