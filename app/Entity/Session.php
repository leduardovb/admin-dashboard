<?php

namespace App\Entity;

class Session {
    const SESSION_STARTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;

    private $sessionState = self::SESSION_NOT_STARTED;

    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance)) self::$instance = new self;
        self::$instance->startSession();
        return self::$instance;
    }

    public function startSession() {
        if ( $this->sessionState == self::SESSION_NOT_STARTED ) $this->sessionState = session_start();
        return $this->sessionState;
    }

    public function __set($key , $value ) {
        $_SESSION[$key] = $value;
    }

    public function __get( $key ) {
        if (isset($_SESSION[$key])) return $_SESSION[$key];
    }

    public function destroy() {
        if ( $this->sessionState == self::SESSION_STARTED ) {
            $this->sessionState = !session_destroy();
            unset( $_SESSION );
            return !$this->sessionState;
        }
        return FALSE;
    }
}