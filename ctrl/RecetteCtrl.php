<?php

namespace Ctrl;

use Manager\{
    LinkManager,
    RecetteManager
};
use PDO;

/**
 * Contrôleur associé à la section Recettes
 * @package Ctrl
 */
class RecetteCtrl extends GtgController
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
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche toutes les recettes
     * @return void
     */
    public function all(): void
    {
        $recettes = $this->recetteManager->findAll();
        $this->render(ROOT_DIR . 'view/recettes.php', compact('recettes'));
    }

    /**
     * Affiche la recette dont l'id est passé en paramètre
     * @param int $id
     * @return void
     */
    public function show(int $id): void
    {
        $recettes = $this->recetteManager->findAll();
        $recette = $this->recetteManager->findOne($id);
        $links = $this->linkManager->findAllAsides($idRub = 13, ['site-ext', 'menu-rubrique']);
        if (($recette) != null) {
            $this->render(ROOT_DIR . 'view/recette.php', compact('recettes', 'recette', 'links'));
        } else {
            $this->notFound();
        }
    }

}
