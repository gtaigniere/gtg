<?php

namespace Form;

use Html\Form;
use Model\Recette;

class RecetteForm extends Form
{
    public function __construct(Recette $recette)
    {
        parent::__construct();
        $this->add('id', $recette->getIdRec());
        $this->add('label', $recette->getLabel());
        $this->add('infos', $recette->getInfos());
        $this->add('pour', $recette->getPour());
        $this->add('ingredient', $recette->getIngredient());
        $this->add('photo', $recette->getPhoto());
        $this->add('detail', $recette->getDetail());
    }

}