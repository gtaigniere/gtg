<?php

namespace Ctrl\Admin;

use Ctrl\Controller;
use Manager\PhotoManager;
use Model\Photo;
use PDO;

class PhotoCtrl extends Controller
{
    /**
     * @var string
     */
    private $photoManager;

    /**
     * PhotoCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->photoManager = new photoManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $photos = $this->photoManager->findAll();
        require (ROOT_DIR . 'view/admin/listPhotos.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $photo = $this->photoManager->findOne($id);
        require_once (ROOT_DIR . 'view/admin/onePhoto.php');
    }

}