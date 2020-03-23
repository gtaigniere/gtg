<?php

namespace Manager;

use PDO;
use Model\Vietnam;

class VnManager extends Manager
{
    /**
     * VnManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct(Vietnam::class, $db);
    }

}