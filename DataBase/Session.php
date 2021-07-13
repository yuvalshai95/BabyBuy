<?php

class Session{

    public static function init(){
        session_start();

    }

    public static function set($key, $val){
        $_SESSION[$key] =  $val;
    }

    public static function get($key){
        if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}else {
			return false;
		}
    }

    public static function destroySession(){
        session_destroy();
        header("Location:home-page.php");
    }

    public static function checkLogin(){
        self::init();
        if (self::get("adminLoginFromAdminClass") == true ) {
            header("Location: ../admin/dashbord.php");
        }

    }
}

?>