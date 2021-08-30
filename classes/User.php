<?php 
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../DataBase/DB_Config.php');
    require_once ($filepath.'/../DataBase/Session.php');

 ?>

 <?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database();
    } 
    
    /*
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE UserID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
      
    public function checkLoginInfo($email, $pass){
        $email =  mysqli_real_escape_string($this->db->link, $email );
        $pass =  mysqli_real_escape_string($this->db->link, $pass );

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

                header("Location: ../homepage.php");
            }    
    }
*/

    public function userInsert($data){
        $firstName  =  mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName   =  mysqli_real_escape_string($this->db->link, $data['lastName']);
        $city       =  mysqli_real_escape_string($this->db->link, $data['city']);
        $userEmail  =  mysqli_real_escape_string($this->db->link, $data['email']);
        $userPass   =  mysqli_real_escape_string($this->db->link, $data['password']);
        $userPhone  =  mysqli_real_escape_string($this->db->link, $data['phone']);
        $address    =  mysqli_real_escape_string($this->db->link, $data['address']);

        $interest = $data['categories'];
        $interestToInsert = "";
        foreach ($interest as $category) {
            $interestToInsert .= $category.",";
        }

        // Removing "," from the string on the right 
        $interestToInsert = rtrim($interestToInsert,",");
        
        // Replace all "," with white spaces
        $interestToInsert = str_replace(',',' ',$interestToInsert);
       

        $query = "INSERT INTO users (FirstName,LastName,City,UserEmail,UserPassword,PhoneNumber,Interest,Address)
                   VALUES ('$firstName','$lastName','$city',' $userEmail','$userPass','$userPhone','$interestToInsert','$address')";
        
        $this->db->insert($query);

        // Send user back to register page with msg
        header("location: ../register.php?error=none");
        exit(); // Stop the script from running
    }











    }
 ?>
