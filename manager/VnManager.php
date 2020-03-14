<?php

require_once ROOT_DIR . 'manager/Manager.php';
require_once ROOT_DIR . 'config/MyPdo.php';
require_once ROOT_DIR . 'model/Vietnam.php';


class VnManager extends Manager
{
    /**
     * VnManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct('Vietnam', $db);
    }

}