<?php

namespace Ctrl;

use Manager\LinkManager;
use Manager\PhotoManager;
use Manager\RecetteManager;
use Manager\VnManager;
use PDO;

class VnCtrl extends Controller
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
    }

    public function home(): void
    {
        $recettes = $this->recetteManager->findAll();
        $links = $this->linkManager->findAsidesByLabelRub('vietnam' ,['site-ext', 'menu-rubrique']);
        require_once ROOT_DIR . 'view/vietnam.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    public function galerie(): void
    {
        $recettes = $this->recetteManager->findAll();
        $photos = $this->photoManager->findAll();
        $links = $this->linkManager->findAsidesByLabelRub('vietnam', ['site-ext', 'menu-rubrique']);
        require_once ROOT_DIR . 'view/galerie.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}