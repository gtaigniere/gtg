<?php

namespace Form;

use Core\Html\Form;

/**
 * Classe associée au formulaire de recherche
 * @package Form
 */
class SearchForm extends Form
{
    const WITHOUT_CAT = '-1'; // Correspond au choix 'sans catégorie' dans la recherche
    /**
     * SearchForm constructor.
     * @param array $datas
     */
    public function __construct(array $datas = [])
    {
        // Si aucune valeur n'est sélectionnée alors on sélectionne la valeur par defaut
        $datas['cats'] = array_key_exists('cats', $datas) && is_array($datas['cats']) ? static::sanitize($datas['cats']) : self::DEFAULT_VALUE;
        $datas['languages'] = array_key_exists('languages', $datas) && is_array($datas['languages']) ? static::sanitize($datas['languages']) : self::DEFAULT_VALUE;
        parent::__construct($datas);
        // Ces paramètres sont utilisés pour le routage et sont destinés à être mis en forme dans des inputs cachés
           $this->add('target', 'snippet');
           $this->add('action', 'search');
    }

    /**
     * Enlève les doublons et les '', d'un tableau
     * ainsi que le '0' si celui-ci n'est pas seul dans le tableau
     * Le zéro correspondant à la sélection 'sans catégorie' dans la recherche
     * @param int[] $tab
     * @return int[]
     */
    private static function sanitize(array $tab): array
    {
        $tab = array_diff(array_unique($tab), [self::DEFAULT_VALUE]);
        $dif = array_diff($tab, [self::WITHOUT_CAT]);
        return empty($dif) ? $tab : $dif;
    }

}