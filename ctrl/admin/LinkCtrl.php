<?php

namespace Ctrl\Admin;

use Exception;
use Html\Form;
use Manager\LinkManager;
use Manager\RubricManager;
use Manager\TypeManager;
use Model\Link;
use PDO;
use Util\ErrorManager;
use Util\SuccessManager;

class LinkCtrl
{
    /**
     * @var LinkManager
     */
    private $linkManager;

    /**
     * @var RubricManager
     */
    private $rubricManager;

    /**
     * @var TypeManager
     */
    private $typeManager;

    /**
     * LinkCtrl constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->linkManager = new LinkManager($db);
        $this->rubricManager = new RubricManager($db);
        $this->typeManager = new TypeManager($db);
    }

    /**
     * @return void
     */
    public function all(): void
    {
        $links = $this->linkManager->findAll();
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once(ROOT_DIR . 'view/admin/links.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function one(int $id): void
    {
        $link = $this->linkManager->findOne($id);
        require_once(ROOT_DIR . 'view/admin/.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function add(Form $form): void
    {
        $link = new Link();
        $link->setLabel($form->getValue('label'));
        $link->setAdrOrFile($form->getValue('adrOrFile'));
        $idRub = $form->getValue('idRub');
        $rubric = is_numeric($idRub) ? $this->rubricManager->findOne((int)$idRub) : null;
        $link->setRubric($rubric);
        $idType = $form->getValue('idType');
        $type = is_numeric($idType) ? $this->typeManager->findOne((int)$idType) : null;
        $link->setType($type);
        $link = $this->linkManager->insert($link);
        if ($link == null) {
            ErrorManager::add('Erreur lors de l\'ajout du lien !');
        } else {
            SuccessManager::add('Le lien a été ajouté avec succès.');
        }
        $links = $this->linkManager->findAll();
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once(ROOT_DIR . 'view/admin/links.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param int $id
     * @return void
     */
    public function del(int $id): void
    {
        $result = $this->linkManager->delete($id);
        if (!$result) {
            ErrorManager::add('Erreur lors de la suppression du lien !');
        } else {
            SuccessManager::add('Le lien a été supprimé avec succès.');
        }
        $links = $this->linkManager->findAll();
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once(ROOT_DIR . 'view/admin/links.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function upd(Form $form): void
    {
        $link = new Link();
        $link->setLabel($form->getValue('label'));
        $link->setAdrOrFile($form->getValue('adrOrFile'));
        $idRub = $form->getValue('idRub');
        $rubric = is_numeric($idRub) ? $this->rubricManager->findOne((int)$idRub) : null;
        $link->setRubric($rubric);
        $idType = $form->getValue('idType');
        $type = is_numeric($idType) ? $this->typeManager->findOne((int)$idType) : null;
        $link->setType($type);
        $link->setIdLink($form->getValue('idLink'));
        $link = $this->linkManager->update($link);
        if ($link == null) {
            ErrorManager::add('Erreur lors de la modification du lien !');
        } else {
            SuccessManager::add('Le lien a été modifié avec succès.');
        }
        $links = $this->linkManager->findAll();
        $rubrics = $this->rubricManager->findAll();
        $types = $this->typeManager->findAll();
        require_once(ROOT_DIR . 'view/admin/links.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

    /**
     * @param array $datas
     */
    public function validate(array $datas)
    {
        // Vérifier le type des variables
        require_once(ROOT_DIR . 'view/admin/validation.php');
        require_once(ROOT_DIR . 'view/template.php');
    }

}