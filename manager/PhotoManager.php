<?php

namespace Manager;

use PDO;

/**
 * Class PhotoManager
 * @package Manager
 */
class PhotoManager extends Manager
{
    const CHEMIN = ROOT_DIR . 'imgs/galerie/';
    const FILES_EXT = ['jpg', 'png'];

    /**
     * PhotoManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Photo::class, $db);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return array_map( // F:\PHP(Perso)\gtg\imgs/galerie/photo1-mini.jpg
            function(string $photo) {
                    return str_replace('F:\\PHP(Perso)\\gtg\\', '', $photo);
//                return 'imgs/galerie/' . pathinfo($photo, PATHINFO_FILENAME);
            }, glob(self::CHEMIN . '*-mini.{' . join(',', self::FILES_EXT) . '}', GLOB_BRACE)
        );
    }

}