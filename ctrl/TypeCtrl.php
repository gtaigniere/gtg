<?php

namespace Ctrl;

use Manager\TypeManager;
use PDO;

/**
 * Class TypeCtrl
 * Contrôleur associé à la section Types
 * @package Ctrl
 */
class TypeCtrl extends GtgController
{
    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * TypeCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->typeManager = new typeManager($db);
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la page de la liste des types
     * @return void
     */
    public function all(): void
    {
        $types = $this->typeManager->findAll();
        $this->render(ROOT_DIR . 'view/admin/listTypes.php', compact('types'));
    }

    /**
     * Affiche la page d'un type
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $type = $this->typeManager->findOne($id);
        $this->render(ROOT_DIR . 'view/admin/oneType.php', compact('type'));
    }

}