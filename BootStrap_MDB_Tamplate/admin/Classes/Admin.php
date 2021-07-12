<?php 
    require_once '../DataBase/Session.php'; 
    require_once '../DataBase/DB_Config.php'; 
 ?>

<?php

class Admin{

    private $db;

    public function __costruct(){
       $this->db = new Database();
    }

     public function checkLoginInfo($adminEmail,$adminPass){

        /* Remove the special characters from the
         string using mysqli_real_escape_string
        */
        $adminEmail_escape = mysqli_real_escape_string ($this->db->conn,$adminEmail); 
        $adminPass_escape = mysqli_real_escape_string ($this->db->conn,$adminPass);

        if( empty($adminEmail) || empty($adminPass) ){
            $login_msg = "Email or Password cant be empty";
            return $login_msg;   
        }else{
            $query = "SELECT * 
                      FROM user 
                      WHERE Role='admin' AND Email='$adminEmail_escape' AND UserPassword='$adminPass_escape'";
            $result =           
        }
     }
     


}
?>