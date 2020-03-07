<?php

class MyPdo extends PDO {

    private $_sgbd = 'mysql';
    private $_bdd = 'gtg';
    private $_host = 'localhost';
    private $_user = 'gilles';
    private $_password = '19690512';
    // private static $_instance; // Variable de classe

    public function __construct()
    {
        $sgbdHost = $this->_sgbd . ':dbname=' . $this->_bdd . ';host=' . $this->_host;
        parent::__construct($sgbdHost, $this->_user, $this->_password);
    }

}
