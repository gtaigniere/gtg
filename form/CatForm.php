<?php

namespace Form;

use Core\Html\Form;
use Model\Cat;

class CatForm extends Form
{
    /**
     * CatForm constructor.
     * @param Cat $cat
     */
    public function __construct(Cat $cat)
    {
        parent::__construct();
        $this->add('id', $cat->getIdCat());
        $this->add('label', $cat->getLabel());
    }

}