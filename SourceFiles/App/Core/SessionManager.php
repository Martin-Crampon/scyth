<?php

namespace App\Core;

class SessionManager
{
    const SESSION_ON  = TRUE;
    const SESSION_OFF = FALSE;

    private static $activeInstance;

    private $state = self::SESSION_OFF;

    private function __construct()
    {
        if (!isset(self::$activeInstance)) :
            self::$activeInstance = new self;
        endif;

        self::$activeInstance->startSession();

        return self::$activeInstance;
    }

    public function startSession()
    {
        if ($this->state == self::SESSION_OFF) :
            $this->state = session_start();
        endif;

        return $this->state;
    }
}
