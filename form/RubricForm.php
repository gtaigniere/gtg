<?php

namespace Form;

use Core\Html\Form;
use Model\Rubric;

class RubricForm extends Form
{
    /**
     * TypeForm constructor.
     * @param Rubric $rubric
     */
    public function __construct(Rubric $rubric)
    {
        parent::__construct();
        $this->add('id', $rubric->getIdRub());
        $this->add('label', $rubric->getLabel());
        $this->add('image', $rubric->getImage());
    }

}