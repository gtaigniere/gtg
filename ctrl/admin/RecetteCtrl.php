<?php

namespace Ctrl\Admin;

use Manager\RecetteManager;
use PDO;

/*
require_once (ROOT_DIR . 'config/MyPdo.php');
require_once (ROOT_DIR . 'manager/RecetteManager.php');
*/

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
        require (ROOT_DIR . 'view/admin/listRecettes.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $recette = $this->recetteManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneRecette.php');
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function add(Recette $recette): void
    {
        $recette = $this->recetteManager->insert($recette);
        require_once (ROOT_DIR . 'view/admin/oneRecette.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->recetteManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listRecettes.php');
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function upd(Recette $recette): void
    {
        $recette = $this->recetteManager->update($recette);
        require_once (ROOT_DIR . 'view/admin/oneRecette.php');
    }

}