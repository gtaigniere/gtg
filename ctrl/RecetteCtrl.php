<?php

namespace Ctrl;

use Manager\LinkManager;
use Manager\RecetteManager;
use PDO;

class RecetteCtrl extends Controller
{
    /**
     * @var RecetteManager
     */
    private $recetteManager;

    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * RecetteCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->recetteManager = new RecetteManager($db);
        $this->linkManager = new LinkManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $recettes = $this->recetteManager->findAll();

        require ROOT_DIR . 'view/template.php';
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id): void
    {
        $recette = $this->recetteManager->findOne($id);
        $links = $this->linkManager->findAllAsides($idRub = 13, ['recette', 'site-ext', 'menu-rubrique']);
        if (!is_null($recette)) {
            require_once ROOT_DIR . 'view/recette.php';
            require_once ROOT_DIR . 'view/template.php';
        } else {
            $this->notFound();
        }
    }

}