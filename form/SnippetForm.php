<?php

namespace Form;

use Core\Html\Form;
use Model\{
    Cat,
    Snippet
};

/**
 * Classe associée aux formulaires pour la classe Snippet
 * @package Form
 */
class SnippetForm extends Form
{

    /**
     * SnippetForm constructor.
     * @param $snippet
     */
    public function __construct($snippet)
    {
        if ($snippet instanceof Snippet) {
            parent::__construct(
                [
                    'title' => $snippet->getTitle(),
                    'code' => $snippet->getCode(),
                    'dateCrea' => $snippet->getDateCrea()->format('d-m-Y H:i:s'),
                    'comment' => $snippet->getComment(),
                    'requirement' => $snippet->getRequirement(),
                    'idLang' => $snippet->getLanguage() != null ? $snippet->getLanguage()->getIdLang() : null,
                    'idUser' => $snippet->getUser() != null ? $snippet->getUser()->getIdUser() : null,
                    'cats' =>
                        array_map(function (Cat $cat) {
                            return $cat->getIdCat();
                        }, $snippet->getCats()),
                    'idSnip' => $snippet->getIdSnip()
                ]
            );
        } else {
            parent::__construct($snippet);
        }
    }

}
