<?php

namespace Core\Html;

/**
 * Class Form
 * Représente les données d'un formulaire
 * @package Html
 */
class Form
{
    /**
     * Tableau associatifs dont le clefs correspondent aux champs "name" des différentes parties d'un formulaire
     * @var array
     */
    private $datas;

    const DEFAULT_VALUE = '';

    /**
     * Form constructor.
     * @param array $datas
     */
    public function __construct(array $datas = [])
    {
        $this->datas = $datas;
    }

    /**
     * Ajoute une clef et sa valeur au formulaire
     * @param string $key
     * @param string|string[] $value Peut prendre une chaîne de caractères ou un tableau
     * @return void
     */
    public function add(string $key, $value)
    {
        $this->datas[$key] = $value;
    }

    /**
     * Renvoi l'ensemble des valeurs des champs du formulaire
     * @return array
     */
    public function getDatas(): array
    {
        return $this->datas;
    }

    /**
     * Renvoi la ou les valeurs associées à la clef passée en paramètres
     * @param string $key
     * @return array|string|null Peut être un tableau, une chaîne de caractères, ou null.
     * Si la clef n'existe pas, renvoi null
     */
    public function getValue($key)
    {
        return array_key_exists($key, $this->datas) ? $this->datas[$key] : null;
    }

    /**
     * Renvoi un string contenant l'input d'un formulaire en fonction des paramètres fournis
     * Si une valeur est associée à l'attribut $name, elle sera associée au champs "value" de l'html
     * Si un type est donné dans le tableau $options tel que : $options['type'] = 'givenType'
     * alors <input type="givenType" ...> sinon par défaut le type sera "text"
     * @param string $name Correspond aux champs "name" et "id" de l'input
     * @param string|null $label Si différent de null alors affiche le champs "label" tel que :
     * <label for="givenName">given label</label> <input id="givenName" ... name="givenName">
     * @param array $options Tableau associatif dont les clefs correspondent aux attributs passés à l'input
     * @return string
     */
    public function input(string $name, ?string $label = null, array $options = []): string
    {
        $params = '';
        if (!array_key_exists('type', $options)) {
            $options['type'] = 'text';
        }
        foreach ($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value . '"';
        }
        if ($options['type'] == "checkbox") {
            $params .= $this->getValue($name) != null ? ' checked' : '';
        } else {
            $params .= ' value="' . $this->getValue($name) . '"';
        }
        $html = '';
        if ($label != null) {
            $html = '<label for="' . $name . '">' . $label . '</label>';
        }
        return $html .= '<input id="' . $name . '" name="' . $name . '"' . $params . '>';
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
     * Renvoi un tableau contenant le ou les élément(s) sélectionné(s) pour le champ de type select "$name"
     * @param string $name Correspond au nom du champ du select
     * @return array
     */
    private function getSelectedValues(string $name) :array
    {
        $selecteds = $this->getValue($name);
        return is_array($selecteds) ? $selecteds : [$selecteds];
    }

    /**
     * @param string $name Clef du tableau $datas
     * @param array $values
     * @param string|null $label Etiquette texte du champ
     * @param string|null $defaultOption
     * @param array $options
     * @param bool $multiple
     * @return string
     */
    public function select(string $name, array $values, ?string $label = null, ?string $defaultOption = null, array $options = [], bool $multiple = false): string
    {
        $params = '';
        foreach($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value . '"';
        }
        $selecteds = $this->getSelectedValues($name); // Récupération de la liste des ids des éléments à sélectionner
        $html = '';
        if ($label != null ) {
            $html .= '<label for="' . $name . '">' . $label . '</label>';
        }
        $html .= '<select id="' . $name . '"' . $params . ' name="' . $name . ($multiple ? '[]" multiple >' : '" >');
        if ($defaultOption != null) {
            $html .= '<option value="' . self::DEFAULT_VALUE . '"' . (empty($selecteds) ? ' selected' : '') . '>' . $defaultOption . '</option>';
        }
        foreach($values as $key => $value) {
            // $this->getValue('language') renvoi l'id du language à sélectionner
            // $this->getValue('cats') renvoi un tableau contenant les ids des catégories à sélectionner
            $html .= '<option value="' . $key . '"' . (in_array($key, $selecteds) ? ' selected' : '') . '>' . $value . '</option>';
        }
        return $html .= '</select>';
    }

}
