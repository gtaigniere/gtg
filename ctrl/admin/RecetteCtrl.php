<?php

namespace Ctrl\Admin;

use Manager\RecetteManager;
use Model\Recette;
use PDO;

class RecetteCtrl
{
    /**
     * @var string
     */
    private $recetteManager;

    /**
     * RecetteCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->recetteManager = new recetteManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $recettes = $this->recetteManager->findAll();
        require (ROOT_DIR . 'view/admin/recettes.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $recette = $this->recetteManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/recette.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function add(Recette $recette): void
    {
        $recette = $this->recetteManager->insert($recette);
        require_once (ROOT_DIR . 'view/admin/recettes.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->recetteManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/recettes.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function upd(Recette $recette): void
    {
        $recette = $this->recetteManager->update($recette);
        require_once (ROOT_DIR . 'view/admin/recettes.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}