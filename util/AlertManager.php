<?php

namespace Util;

use Exception;

abstract class AlertManager
{
    /**
     * @var AlertManager
     */
    protected static $instance;

    /**
     * @var array
     */
    private $messages = [];

    /**
     * Alert constructor.
     * @param array $messages
     * @throws Exception
     */
    protected function __construct(array &$messages)
    {
        if (is_array($messages)) {
            $this->messages = $messages;
        } else {
            throw new Exception('$messages must be an array !');
        }
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string $message
     */
    public function add(string $message)
    {
        $this->messages[] = $message;
    }

    /**
     * Détruit le tableau de messages
     */
    public function destroy()
    {
        unset($messages);
    }

}