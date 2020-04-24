<?php

namespace Form;

use Html\Form;
use Model\Cat;
use Model\Snippet;

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
                    'language' => $snippet->getLanguage()->getIdLang(),
                    'user' => $snippet->getUser()->getIdUser(),
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