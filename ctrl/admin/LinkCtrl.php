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
    public function all(): ?
    {
        $links = $this->linkManager->findAll();
        require (ROOT_DIR . 'view/admin/allLinks.php');
    }

    /**
     * @param int $id
     */
    public function one(int $id): ?
    {
        $link = $this->linkManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneLink.php');
    }

    /**
     * @param Link $link
     */
    public function add(Link $link): ?
    {
        $link = $this->linkManager->insert($link);
        require_once (ROOT_DIR . 'view/admin/oneLink.php');
    }

    /**
     * @param int $id
     */
    public function del(int $id): ?
    {
        $result = $this->linkManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listLinks.php');
    }

    /**
     * @param Link $link
     */
    public function upd(Link $link): ?
    {
        $link = $this->linkManager->update($link);
        require_once (ROOT_DIR . 'view/admin/oneLink.php');
    }

}