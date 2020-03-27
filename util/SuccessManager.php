<?php

namespace Util;

use Exception;

class SuccessManager
{

    /**
     * @return array
     */
    public static function getMessages(): array
    {
        return isset($_SESSION['success']) ? $_SESSION['success'] : [];
    }

    /**
     * @param string $message
     */
    public static function add(string $message)
    {
        if (!isset($_SESSION['success'])) {
            $_SESSION['success'] = [];
        }
        $_SESSION['success'][] = $message;
    }

    /**
     * Détruit le tableau de messages
     */
    public static function destroy()
    {
        unset($_SESSION['success']);
    }

}