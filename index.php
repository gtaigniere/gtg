<?php

require_once 'config/config.php';
require_once ROOT_DIR . 'ctrl/DefaultCtrl.php';
require_once ROOT_DIR . 'ctrl/RubricCtrl.php';
require_once ROOT_DIR . 'ctrl/TypeCtrl.php';
require_once ROOT_DIR . 'ctrl/LinkCtrl.php';

$db = new MyPdo();

if (isset($_GET['target'])) {

    if ($_GET['target'] == 'autres_sites') {
        $ctrl = new DefaultCtrl();
        $ctrl->otherSites();
    } elseif ($_GET['target'] == 'snippets') {
        // $ctrl = new SnippetCtrl($db);
        // require ROOT_DIR . 'view/snippets.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'vietnam') {
        $ctrl = new DefaultCtrl();
        $ctrl->vietnam();
    } elseif ($_GET['target'] == 'connexion') {
        // $ctrl = new ();
        require ROOT_DIR . 'view/connexion.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'rubric') {
        $ctrl = new RubricCtrl($db);
        if (isset($_GET['id'])) { // Si un id de rubrique est présent alors on l'affiche
            $ctrl->show($_GET['id']);
        } else { // Sinon on affiche la page d'accueil
            $ctrl->index();
        }
    } elseif ($_GET['target'] == 'contact') {
        $ctrl = new DefaultCtrl();
        $ctrl->contact();
    }
} else {
    $ctrl = new RubricCtrl($db);
    $ctrl->index();
}
