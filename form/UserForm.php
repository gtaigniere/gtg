<?php

namespace Form;

use Core\Html\Form;
use Model\User;

/**
 * Classe associée aux formulaires pour la classe User
 * @package Form
 */
class UserForm extends Form
{
    /**
     * UserForm constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->add('id', $user->getIdUser());
        $this->add('pseudo', $user->getPseudo());
        $this->add('email', $user->getEmail());
        $this->add('pwd', $user->getPwd());
        $this->add('confirmKey', $user->getConfirmKey());
        $this->add('confirmed', $user->isConfirmed());
    }
}