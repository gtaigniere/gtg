<?php

require_once 'config/config.php';
require_once ROOT_DIR . 'ctrl/RubricCtrl.php';

$db = new MyPdo();

if (isset($_GET['target'])) {

    if ($_GET['target'] == 'autres_sites') {
        require ROOT_DIR . 'view/autres_sites.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'snippets') {
        require ROOT_DIR . 'view/snippets.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'vietnam') {
        require ROOT_DIR . 'view/vietnam.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'connexion') {
        require ROOT_DIR . 'view/connexion.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'rubric') {
        $ctrl = new RubricCtrl($db);
        if (isset($_GET['id'])) {
            $ctrl->show($_GET['id']);
        } else {
            $ctrl->notFound();
        }
    }
} else {
    $ctrl = new RubricCtrl($db);
    $ctrl->index();
}
