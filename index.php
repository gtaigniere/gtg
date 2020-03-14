<?php

session_start();

require_once 'config/config.php';
require_once ROOT_DIR . 'ctrl/HomeCtrl.php';
require_once ROOT_DIR . 'ctrl/RubricCtrl.php';
require_once ROOT_DIR . 'ctrl/TypeCtrl.php';
require_once ROOT_DIR . 'ctrl/LinkCtrl.php';
require_once ROOT_DIR . 'ctrl/VnCtrl.php';
require_once ROOT_DIR . 'ctrl/RecetteCtrl.php';

$db = new MyPdo();

if (isset($_GET['target'])) {

    if ($_GET['target'] == 'autres_sites') {
        $ctrl = new HomeCtrl();
        $ctrl->otherSites();
    } elseif ($_GET['target'] == 'snippets') {
        // $ctrl = new SnippetCtrl($db);
        // require ROOT_DIR . 'view/snippets.php';
        require ROOT_DIR . 'view/template.php';
    } elseif ($_GET['target'] == 'vietnam') {
        $ctrl = new VnCtrl($db);
        $ctrl->home();
    } elseif ($_GET['target'] == 'recette') {
        $ctrl = new RecetteCtrl($db);
        if (isset($_GET['id'])) { // Si un id de recette est présent alors on l'affiche
            $ctrl->show($_GET['id']);
        } else { // Sinon on affiche la page vietnam
            $ctrl = new VnCtrl($db);
            $ctrl->home();
        }
    } elseif ($_GET['target'] == 'galerie') {
        $ctrl = new VnCtrl($db);
        $ctrl->galerie();
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
        $ctrl = new HomeCtrl();
        $ctrl->contact();
    }
} else {
    $ctrl = new RubricCtrl($db);
    $ctrl->index();
}
