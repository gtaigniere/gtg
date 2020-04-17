<?php

namespace Html;

class Form
{
    /**
     * @var array
     */
    private $datas;

    /**
     * Form constructor.
     * @param array $datas
     */
    public function __construct(array $datas)
    {
        $this->datas = $datas;
    }

    /**
     * @return array
     */
    public function getDatas(): array
    {
        return $this->datas;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getValue(string $key)
    {
        return array_key_exists($key, $this->datas) ? $this->datas[$key] : null;
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param array $options
     * @return string
     */
    public function input(string $name, ?string $label = null, array $options = []): string
    {
        $params = '';
        foreach ($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value .'"';
        }
        if (!array_key_exists('type', $options)) {
            $params .= ' type="text"';
        }
        $html = '';
        if ($label != null) {
            $html = '<label for="' . $name . '">' . $label . '</label>';
        }
        return $html .= '<input id="' . $name . '" name="' . $name . '" value="' . $this->getValue($name) . '"' . $params . '>';
    }

    /**
    * @param string $name
    * @param string|null $label
    * @param array $options
    * @return string
    */
    public function textarea(string $name, ?string $label = null, array $options = []): string
    {
        $params = '';
        foreach($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value . '"';
        }
        $html = '';
        if ($label != null ) {
            $html .= '<label for="' . $name . '">' . $label . '</label>';
        }
        return $html .= '<textarea id="' . $name . '" name="' . $name . '"' . $params .'>' . $this->getValue($name) . '</textarea>';
    }

    /**
     * @param string $name Clef du tableau $datas
     * @param array $values
     * @param string|null $label Etiquette texte du champ
     * @param string|null $defaultOption
     * @param array $options
     * @return string
     */
    public function select(string $name, array $values, ?string $label = null, ?string $defaultOption = null, array $options = []): string
    {
        $params = '';
        foreach($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value . '"';
        }
        $selecteds = $this->getValue($name);
        $html = '';
        if ($label != null ) {
            $html .= '<label for="' . $name . '">' . $label . '</label>';
        }
        $html .= '<select id="' . $name . '" name="' . $name . '"' . $params . '>';
        if ($defaultOption != null) {
            $html .= '<option value=""> ' . $defaultOption . '</option>';
        }
        foreach($values as $key => $value) {
            // $this->getValue('language') renvoi l'id du language à sélectionner
            // $this->getValue('cats') renvoi un tableau contenant les ids des catégories à sélectionner
            $selected = '';
            if ((is_array($selecteds) && in_array($key, $selecteds)) ||
                $selecteds == $key) {
                    $selected = ' selected';
            };
            $html .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
        }
        return $html .= '</select>';
    }

}
