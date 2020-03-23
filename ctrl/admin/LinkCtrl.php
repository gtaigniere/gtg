<?php

namespace Ctrl\Admin;

use Manager\LinkManager;
use Manager\RubricManager;
use Manager\TypeManager;
use Model\Link;
use PDO;

class LinkCtrl
{
    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new LinkManager($db);
        $this->rubricManager = new RubricManager($db);
        $this->typeManager = new TypeManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $links = $this->linkManager->findAll();
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require(ROOT_DIR . 'view/admin/links.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Link $link
     * @return void
     */
    public function add(Link $link): void
    {
        $link = $this->linkManager->insert($link);
        require_once (ROOT_DIR . 'view/admin/links.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->linkManager->delete($id);
        require_once(ROOT_DIR . 'view/admin/links.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Link $link
     * @return void
     */
    public function upd(Link $link): void
    {
        $link = $this->linkManager->update($link);
        require_once (ROOT_DIR . 'view/admin/links.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once (ROOT_DIR . 'view/admin/validation.php');
        require_once (ROOT_DIR . 'view/template.php');
    }

}