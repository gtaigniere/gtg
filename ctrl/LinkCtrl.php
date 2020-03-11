<?php

require_once (ROOT_DIR . 'manager/LinkManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class LinkCtrl
{
    /**
     * @var string
     */
    private $linkManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new linkManager($db);
    }

    /**
     * @param int $idRub
     * @return void
     */
    public function allByRubric(int $idRub): void
    {
        $links = $this->linkManager->findAllByRubric($idRub);
        require (ROOT_DIR . 'view/' . $rubric . '.php');
    }

}