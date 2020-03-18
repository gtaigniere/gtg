<?php

namespace Ctrl;

use Manager\LinkManager;
use Manager\PhotoManager;
use Manager\VnManager;
use PDO;

/*
require_once ROOT_DIR . 'ctrl/Controller.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'manager/VnManager.php';
require_once ROOT_DIR . 'manager/LinkManager.php';
require_once ROOT_DIR . 'manager/PhotoManager.php';
*/

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
     * VnCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->vnManager = new VnManager($db);
        $this->linkManager = new LinkManager($db);
        $this->photoManager = new PhotoManager($db);
    }

    /**
    * @param int $id
    * @return void
    */
    public function home(): void
    {
        $links = $this->linkManager->findAsidesByLabelRub('vietnam' ,['recette', 'site-ext', 'menu-rubrique']);
        require_once ROOT_DIR . 'view/vietnam.php';
        require_once ROOT_DIR . 'view/template.php';
    }

    /**
     * @param int $id
     * @return void
     */
    public function galerie(): void
    {
        $photos = $this->photoManager->findAll();
        $links = $this->linkManager->findAsidesByLabelRub('vietnam', ['recette', 'site-ext', 'menu-rubrique']);
        require_once ROOT_DIR . 'view/galerie.php';
        require_once ROOT_DIR . 'view/template.php';
    }

}