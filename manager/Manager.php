<?php

namespace Manager;

use PDO;

abstract class Manager
{
    /**
     * @var string
     */
    protected $className;

    /**
     * @var PDO
     */
    protected $db;

    /**
     * Manager constructor.
     * @param string $className
     * @param PDO $db
     */
    public function __construct(string $className, PDO $db)
    {
        $this->className = $className;
        $this->db = $db;
    }

    /**
     * @param array $assocs
     * @param string $className
     * @return mixed
     */
    protected function convInObj(array $assocs, string $className = null)
    {
        if ($className == null) {
            $className = $this->className;
        }
        if (class_exists($className)) {
            $obj = new $className();
            foreach ($assocs as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($obj, $setter)) {
                    $obj->$setter($value);
                }
            }
        }
        return $obj;
    }

}