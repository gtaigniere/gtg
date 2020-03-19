<?php

namespace Config;

use PDO;

class MyPdo extends PDO {

    private $_sgbd = 'mysql';
    private $_host = 'localhost';
    private $_bdd = 'gtg';
    private $_user = 'gilles';
    private $_password = '19690512';

    public function __construct()
    {
        $sgbdHost = $this->_sgbd . ':host=' . $this->_host . ';dbname=' . $this->_bdd . ';charset=UTF8';
        parent::__construct($sgbdHost, $this->_user, $this->_password);
    }

}
