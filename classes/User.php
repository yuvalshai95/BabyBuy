<?php 
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../DataBase/DB_Config.php');
 ?>

 <?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database();
    } 
    
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE UserID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
      
    public function checkLoginInfo($email, $pass){
        $email =  mysqli_real_escape_string($this->db->link, $email );
        $pass =  mysqli_real_escape_string($this->db->link, $pass );

        // If a field is empty show error msg
        if (empty($email)||empty($pass)) {
            $login_msg = "Email or Password cant be empty";
            return $login_msg; 

        }else{ // Both fields info are sent to the db to find a match
            $query = "SELECT * 
                      FROM users 
                      WHERE UserEmail='$email' AND UserPassword='$pass'";

            $result = $this->db->select($query);

            if($result != false){
                $row = $result->fetch_assoc();
                Session::set('userId',$row['UserID']);
                Session::set('userFirstName',$row['FirstName']);
                Session::set('userLastName',$row['LastName']);
                Session::set('userCity',$row['City']);
                Session::set('userEmail',$row['UserEmail']);
                Session::set('userPass',$row['UserPassword']);
                Session::set('userPhone',$row['PhoneNumber']);
                Session::set('userInterest',$row['Interest']);
                Session::set('userAddress',$row['Address']);

                header("Location: homepage.php");
            }else{
                $login_msg = "Username or Password  are not matching...!";
                return $login_msg;
            }
        }
    }














    }
 ?>
