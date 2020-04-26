<?php

namespace Form;

use Html\Form;
use Model\Type;

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