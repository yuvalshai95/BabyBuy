<?php

class Session{

    public static function init(){
        session_start();

    }

    public static function setSessionKeyValue($key,$value){
        $_SESSION[$key] = $value;
    }

    public static function getSessionKey($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }

    public static function destroySession(){
        session_destroy();
        header("Location:login.php");
    }
}

?>