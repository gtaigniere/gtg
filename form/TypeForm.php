<?php

namespace Form;

use Core\Html\Form;
use Model\Type;

/**
 * Classe associée aux formulaires pour la classe Type
 * @package Form
 */
class TypeForm extends Form
{
    /**
     * TypeForm constructor.
     * @param Type $type
     */
    public function __construct(Type $type)
    {
        parent::__construct();
        $this->add('id', $type->getIdType());
        $this->add('label', $type->getLabel());
    }

}