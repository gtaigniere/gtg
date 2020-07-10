<?php

namespace Form;

use Core\Html\Form;
use Model\Language;

class LanguageForm extends Form
{
    /**
     * LanguageForm constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        parent::__construct();
        $this->add('id', $language->getIdLang());
        $this->add('label', $language->getLabel());
    }

}