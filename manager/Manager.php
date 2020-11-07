<?php

namespace Manager;

use PDO;

/**
 * Fournie un accès à la base de données afin de mettre en place les opérations de CRUD
 * @package Manager
 */
abstract class Manager
{
    /**
     * Nom de l'entité associée au manager
     * @var string
     */
    protected $className;

    /**
     * Accès à la base de données
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
     * Converti les occurences d'une entité de la base de données en objets
     * @param array $assocs Tableau d'occurences d'une entité
     * @return mixed
     */
    protected function convInObj(array $assocs)
    {
        $className = $this->className;
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