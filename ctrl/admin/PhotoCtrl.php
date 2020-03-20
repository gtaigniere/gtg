<?php

namespace Ctrl\Admin;

use Manager\PhotoManager;
use Model\Photo;
use PDO;

class PhotoCtrl
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

    /**
     * @param Photo $photo
     * @return void
     */
    public function add(Photo $photo): void
    {
        $photo = $this->photoManager->insert($photo);
        require_once (ROOT_DIR . 'view/admin/onePhoto.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->photoManager->delete($id);
        require_once (ROOT_DIR . 'view/admin/listPhotos.php');
    }

    /**
     * @param Photo $photo
     * @return void
     */
    public function upd(Photo $photo): void
    {
        $photo = $this->photoManager->update($photo);
        require_once (ROOT_DIR . 'view/admin/onePhoto.php');
    }

}