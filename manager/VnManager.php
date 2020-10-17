<?php

namespace Manager;

use Model\Vietnam;
use PDO;

/**
 * Class VnManager
 * @package Manager
 */
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