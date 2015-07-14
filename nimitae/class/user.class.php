<?php

class User
{
    var $email;
    var $username;
    var $password;
    var $hash;
    var $status;

    function __construct($email, $username, $password, $hash, $status) {
        $this->email = $email;
        $this->username =$username;
        $this->password = $password;
        $this->hash = $hash;
        $this->status = $status;
    }
}