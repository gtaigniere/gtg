<?php

namespace Util;

class ErrorManager
{

    /**
     * @return array
     */
    public static function getMessages(): array
    {
        // Equivalent à return ($_SESSION['error'] != null) ? $_SESSION[error'] : [] ;

        return isset($_SESSION['error']) ? $_SESSION['error'] : [];
    }

    /**
     * @param string $message
     */
    public static function add(string $message): void
    {
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = [];
        }
        $_SESSION['error'][] = $message;
    }

    /**
     * Détruit le tableau de messages
     */
    public static function destroy(): void
    {
        unset($_SESSION['error']);
    }

}