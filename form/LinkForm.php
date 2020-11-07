<?php

namespace Form;

use Core\Html\Form;
use Model\Link;

/**
 * Classe associée aux formulaires pour la classe Link
 * @package Form
 */
class LinkForm extends Form
{
    /**
     * LinkForm constructor.
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        parent::__construct();
        $this->add('id', $link->getIdLink());
        $this->add('label', $link->getLabel());
        $this->add('adrOrFile', $link->getAdrOrFile());
        $this->add('idRub', $link->getRubric() != null ? $link->getRubric()->getIdRub() : null);
        $this->add('idType', $link->getType() != null ? $link->getType()->getIdType() : null);
    }

}