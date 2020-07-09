<?php

namespace Ctrl;

use Manager\RubricManager;
use Manager\LinkManager;
use PDO;

/**
 * Class RubricCtrl
 * Contrôleur associé à la section Rubrics
 * @package Ctrl
 */
class RubricCtrl extends GtgController
{
    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * RubricCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->rubricManager = new RubricManager($db);
        $this->linkManager = new LinkManager($db);
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche la page des rubriques qui est aussi la page d'accueil
     * @return void
     */
    public function index(): void
    {
        $rubrics = $this->rubricManager->findAll();
        $this->render(ROOT_DIR . 'view/accueil.php', compact('rubrics'));
    }

    /**
     * Affiche la page d'une rubrique
     * @param int $id
     * @return void
     */
    public function show(int $id): void
    {
        $rubric = $this->rubricManager->findOne($id);
        if ($rubric != null) {
            $links = $this->linkManager->findAllAsides($id, ['support', 'code', 'site-ext', 'menu-rubrique']);
            $this->render(ROOT_DIR . 'view/rubric/' . $rubric->getLabel() . '.php', compact('links'));
        } else {
            $this->notFound();
        }
    }

}