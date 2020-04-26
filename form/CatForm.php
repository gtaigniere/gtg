<?php

namespace Form;

use Html\Form;
use Model\Cat;

class CatForm extends Form
{
    /**
     * TypeForm constructor.
     * @param Cat $cat
     */
    public function __construct(Cat $cat)
    {
        parent::__construct();
        $this->add('idCat', $cat->getIdCat());
        $this->add('label', $cat->getLabel());
    }

}