<?php

require_once (ROOT_DIR . 'config/MyPdo.php');
require_once (ROOT_DIR . 'manager/LinkManager.php');

class LinkCtrl
{
    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new LinkManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $links = $this->linkManager->findAll();
        require (ROOT_DIR . 'view/admin/allLinks.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/oneLink.php');
    }

    /**
     * @param Link $link
     * @return void
     */
    public function add(Link $link): void
    {
        $link = $this->linkManager->insert($link);
        require_once (ROOT_DIR . 'view/admin/oneLink.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->linkManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listLinks.php');
    }

    /**
     * @param Link $link
     * @return void
     */
    public function upd(Link $link): void
    {
        $link = $this->linkManager->update($link);
        require_once (ROOT_DIR . 'view/admin/oneLink.php');
    }

}