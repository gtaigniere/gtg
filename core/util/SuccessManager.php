<?php

namespace Core\Util;

/**
 * Permet de créer des messages de succès et de les supprimer
 * @package Core\Util
 */
class SuccessManager
{

    /**
     * @return array
     */
    public static function getMessages(): array
    {
        // Equivalent à return ($_SESSION['error'] != null) ? $_SESSION[error'] : [] ;
        return isset($_SESSION['success']) ? $_SESSION['success'] : [];
    }

    /**
     * Ajoute un message au tableau de messages
     * @param string $message
     * @return void
     */
    public static function add(string $message): void
    {
        if (!isset($_SESSION['success'])) {
            $_SESSION['success'] = [];
        }
        $_SESSION['success'][] = $message;
    }

    /**
     * Détruit le tableau de messages
     * @return void
     */
    public static function destroy(): void
    {
        unset($_SESSION['success']);
    }

}