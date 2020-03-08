<?php

require_once 'config/config.php';

/*
$test = new UserManager(new MyPdo);

var_dump($test);
*/

if (isset($_GET['target'])) {
    if ($_GET['target'] == 'rubric') {

    } elseif ($_GET['target'] == 'snippet') {

    }
} else {
    require ROOT_DIR . '../view/accueil.php';
    require ROOT_DIR . '../view/template.php';
}