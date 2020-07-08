<?php

namespace Ctrl;

use Manager\LinkManager;
use PDO;

class LinkCtrl extends Controller
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
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $links = $this->linkManager->findAll();
        require_once (ROOT_DIR . 'view/allLinks.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        require_once (ROOT_DIR . 'view/oneLink.php');
    }

    /**
     * Permet d'ouvrir un lien dont l'id est passé en paramètres
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