<?php

namespace Service;

use Model\User;

class AuthService
{

    public static function isLogged(): bool
    {
        return true;
    }

    /**
     * @return User
     */
    public static function getUser(): User
    {
        $user = new User();
        $user->setIdUser(1);
        $user->setPseudo('gilleste');
        return $user;
    }

}