<?php

require_once (ROOT_DIR . 'manager/LinkManager.php');
require_once (ROOT_DIR . 'config/MyPdo.php');

class LinkCtrl extends Controller
{
    /**
     * @var string
     */
    private $linkManager;

    /**
     * LinkCtrl constructor.
     */
    public function __construct()
    {
        $this->linkManager = new linkManager(new MyPdo());
    }

    /**
     * @return array
     */
    public function allByRubric($idRub): ?
    {
        $links = $this->linkManager->findAllByRubric($idRub);
        require (ROOT_DIR . 'view/' . $rubric . '.php');
    }

}