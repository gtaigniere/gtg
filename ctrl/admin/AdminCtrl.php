<?php

namespace Ctrl\Admin;

use Ctrl\GtgController;

/**
 * Classe mère pour tous les contrôleurs de la section Admin
 * @package Ctrl\Admin
 */
class AdminCtrl extends GtgController
{
    /**
     * Affiche la page de validation d'ajout, de modification, et de suppression
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        $this->render(ROOT_DIR . 'view/admin/validation.php', compact('datas'));
    }
}