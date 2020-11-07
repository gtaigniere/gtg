<?php

namespace Ctrl;

use Manager\LinkManager;
use PDO;

/**
 * Contrôleur associé à la section Liens
 * @package Ctrl
 */
class LinkCtrl extends GtgController
{
    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new LinkManager($db);
        parent::__construct(ROOT_DIR . 'view/template.php');
    }

    /**
     * Affiche tous les liens
     * @return void
     */
    public function all(): void
    {
        $links = $this->linkManager->findAll();
        $this->render(ROOT_DIR . 'view/allLinks.php', compact('links'));
    }

    /**
     * Affiche le lien dont l'id est passé en paramètres
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        $this->render(ROOT_DIR . 'view/oneLink.php', compact('link'));
    }

    /**
     * Permet d'ouvrir le lien dont l'id est passé en paramètres
     * @param int $id
     * @return void
     */
    public function open(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        if (($link) != null) {
            $labelType = $link->getType()->getLabel();
            if ($labelType == 'Site-ext') {
                header('Location: ' . $link->getAdrOrFile());
            } else {
                $contentType = $labelType == 'Support' ? 'application/pdf' : 'plain/text';
                header('Content-type: ' . $contentType);
                header('Content-Disposition: inline; filename=' . $link->getAdrOrFile());
                @readfile('files_asides' .
                    '/' . strtolower($link->getType()->getLabel()) .
                    '/' . strtolower($link->getRubric()->getLabel()) .
                    '/' .$link->getAdrOrFile());
            }
        }
    }

}
