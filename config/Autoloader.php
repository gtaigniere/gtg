<?php

namespace Config;

require_once 'config.php';

class Autoloader {

    static function register() {
        spl_autoload_register(array(__class__, 'autoload'));
    }

    static function autoload($class_name) {
//        $class_name = str_replace(__NAMESPACE__, '', $class_name);
        // \MyPdoCtrl\RubricCtrl
        $chunks = explode('\\', $class_name);
        $fileName = array_pop($chunks) . '.php';
        for ($i = 0; $i < count($chunks); $i++) {
            $chunks[$i] = strtolower($chunks[$i]);
        }
        if ($fileName == 'Rubric.php') {
            var_dump($chunks);
        }
        require ROOT_DIR . join('\\', $chunks) . '\\' . $fileName;
    }

}
