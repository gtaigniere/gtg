<?php

namespace Util;

class ErrorManager
{

    /**
     * @return array
     */
    public static function getMessages(): array
    {
        // Equivalent à return !is_null($_SESSION['error']) ? $_SESSION[error'] : [] ;

        return isset($_SESSION['error']) ? $_SESSION['error'] : [];
    }

    /**
     * @param string $message
     */
    public static function add(string $message)
    {
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = [];
        }
        $_SESSION['error'][] = $message;
    }

    /**
     * Détruit le tableau de messages
     */
    public static function destroy()
    {
        unset($_SESSION['error']);
    }

}