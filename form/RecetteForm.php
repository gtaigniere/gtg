<?php

namespace Form;

use Exception;
use Core\Html\Form;
use Model\Recette;

/**
 * Classe associée aux formulaires pour la classe Recette
 * @package Form
 */
class RecetteForm extends Form
{
    public function __construct($recette)
    {
        parent::__construct();
        if ($recette instanceof Recette) {
            $this->add('id',
                $recette->getIdRec());
            $this->add('label', $recette->getLabel());
            $this->add('infos', $recette->getInfos());
            if (is_numeric($recette->getPour())) {
                $this->add('pour', $recette->getPour());
            } else {
                throw new Exception\PourNotNumericException();
            }
            $this->add('ingredient', $recette->getIngredient());
            $this->add('photo', $recette->getPhoto());
            $this->add('detail', $recette->getDetail());
        } elseif (is_array($recette) && !empty($recette)) {
            $this->add('id', array_key_exists('id', $recette) ? $recette['id'] : null);
            $this->add('label', array_key_exists('label', $recette) ? $recette['label'] : null);
            $this->add('infos', array_key_exists('infos', $recette) ? $recette['infos'] : null);
            if (array_key_exists('pour', $recette) && is_numeric($recette['pour'])) {
                $this->add('pour', $recette['pour']);
            } else {
                throw new Exception\PourNotNumericException();
            }
            $this->add('ingredient', array_key_exists('ingredient', $recette) ? $recette['ingredient'] : null);
            $this->add('photo', array_key_exists('photo', $recette) ? $recette['photo'] : null);
            $this->add('detail', array_key_exists('detail', $recette) ? $recette['detail'] : null);
            if (array_key_exists('validate', $recette)) {
                $this->add('validate', $recette['validate']);
            }
        }
    }

}