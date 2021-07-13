<?php 
    require_once '../DataBase/Session.php'; 
    Session::checkLogin();
    require_once '../DataBase/DB_Config.php'; 
 ?>

<?php

class Admin{

    private $db;

    // Constructor
    public	function __construct(){
       $this->db = new Database();
    }


    // Validation with database 
     public function checkLoginInfo($adminEmail,$adminPass){

        $adminEmail =  mysqli_real_escape_string($this->db->link, $adminEmail );
    	$adminPass =  mysqli_real_escape_string($this->db->link, $adminPass );


        if( empty($adminEmail) || empty($adminPass) ){
            $login_msg = "Email or Password cant be empty";
            return $login_msg;  

        }else{
            $query = "SELECT * FROM admins WHERE AdminEmail='$adminEmail' AND AdminPassword='$adminPass'";

             $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("adminLoginFromAdminClass", true);
                Session::set("AdminID",$value['AdminID']);
                Session::set("AdminEmail",$value['AdminEmail']);
                Session::set("AdminFirstName",$value['AdminFirstName']);
                header("Location: ../admin/index.php");
            }  else{
                $login_msg = "username or password not matching";
                return $login_msg;
            }     
        }
     }
     


}
?>