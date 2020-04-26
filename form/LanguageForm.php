<?php

namespace Form;

use Html\Form;
use Model\Language;

class LanguageForm extends Form
{
    /**
     * TypeForm constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        parent::__construct();
        $this->add('idLang', $language->getIdLang());
        $this->add('label', $language->getLabel());
    }

}