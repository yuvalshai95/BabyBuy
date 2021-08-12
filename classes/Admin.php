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
       $this->db = new Database(); // when creating new db intsnace its opening a connection 
    }

    // Validation with database email and password
     public function checkLoginInfo($adminEmail,$adminPass){

        // Remove the special characters from the
        // string using mysqli_real_escape_string
        // to send the sql query with no errors
        $adminEmail =  mysqli_real_escape_string($this->db->link, $adminEmail );
    	$adminPass =  mysqli_real_escape_string($this->db->link, $adminPass );

        // If a field is empty show error msg
        if( empty($adminEmail) || empty($adminPass) ){
            $login_msg = "Email or Password cant be empty";
            return $login_msg;  

        }else{ // Both fields info are sent to the db to find a match

            // Syntax: SELECT * FROM `table_name` WHERE `condition`
            $query = "SELECT * FROM admins WHERE AdminEmail='$adminEmail' AND AdminPassword='$adminPass'";

             $result = $this->db->select($query); // Send query to db using select method from DataBase class

             // If there is a match with the db
            if ($result != false) {

                //data variables we want to save in our session 
                //from the admin table in the db
                //value is taken from the database
                $value = $result->fetch_assoc();
                Session::set("adminLoginFromAdminClass", true);
                Session::set("AdminID",$value['AdminID']);
                Session::set("AdminEmail",$value['AdminEmail']);
                Session::set("AdminFirstName",$value['AdminFirstName']);
                Session::set("AdminLastName",$value['AdminLastName']);
                Session::set("AdminAddress",$value['AdminAddress']);
                Session::set("AdminCity",$value['AdminCity']);
                Session::set("AdminPhone",$value['AdminPhone']);
                
                header("Location: dashboard.php");
            }else{ // No match from the db
                
                $login_msg = "Username or Password  are not matching...!";
                return $login_msg;
            }     
        }
     }
     


}
?>