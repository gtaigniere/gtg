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

    protected function convInObj(array $assocs)
    {
        if (class_exists($this->className)) {
            $obj = new $this->className();
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