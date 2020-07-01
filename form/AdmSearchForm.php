<?php


namespace Form;


class AdmSearchForm extends SearchForm
{
    /**
     * AdmSearchForm constructor.
     */
    public function __construct(array $datas = [])
    {
        parent::__construct($datas);
        $this->add('target', 'admin'); // Remplace la valeur du parent
        $this->add('admTarg', 'snippet');
        // La valeur "search" de la clef "action" est prise depuis le parent
    }
}