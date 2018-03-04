<?php
defined('TASK') or exit('Access denied');

class AuthException extends Exception{

    public function __construct($text)
    {
        $this->message= $text;
        $_SESSION['auth'] = $text;
    }
}