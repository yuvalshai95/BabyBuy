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
                   VALUES ('$firstName','$lastName','$city','$userEmail','$userPass','$userPhone','$interestToInsert','$address')";
        
        $this->db->insert($query);

        // Send user back to register page with msg
        header("location: ../register.php?error=none");
        exit(); // Stop the script from running
    }

    public function getUserById($Id){
        $query = "SELECT * 
                  FROM users
                   WHERE users.UserID = '$Id'";
        
        $result = $this->db->select($query);

        return $result;
    }


    public function updateUserDetails($id, $firstName, $lastName, $email, $phone, $city, $address){
        $id         =  mysqli_real_escape_string($this->db->link, $id );
        $firstName  =  mysqli_real_escape_string($this->db->link, $firstName );
        $lastName   =  mysqli_real_escape_string($this->db->link, $lastName );
        $city       =  mysqli_real_escape_string($this->db->link, $city);
        $userEmail  =  mysqli_real_escape_string($this->db->link, $email);
        $userPhone  =  mysqli_real_escape_string($this->db->link, $phone);
        $address    =  mysqli_real_escape_string($this->db->link,  $address );

        // Syntax UPDATE table_name SET field1 = new-value1
        $query = "UPDATE users SET FirstName = '$firstName',
                                    LastName = '$lastName',
                                    City = '$city',
                                    UserEmail='$userEmail',
                                    PhoneNumber='$userPhone',
                                    Address='$address'
                  WHERE UserID  = '$id'";

        $update_row = $this->db->update($query);

        if( $update_row !== false){
            header("location: ../profile?update=success");
            exit();
        }else{
            header("location: ../profile?update=error");
            exit();
        }
    }
        

    public function updateUserPassword($id, $newPwd){

        $query = "UPDATE users SET UserPassword  = '$newPwd' WHERE UserID  = '$id'";

        $update_row = $this->db->update($query); 
        
        if( $update_row !== false){
            header("location: ../profile?update=success");
            exit();
        }else{
            header("location: ../profile?update=error");
            exit();
        }
    }


    public function isPasswordDatabase($pwd){

        $query = "SELECT users.UserPassword
        FROM users
        WHERE users.UserPassword = '$pwd'";

       $result = $this->db->select($query);

       return $result;

    }


    public function wishlistIsEmpty($id){

        $query = "SELECT *
                  FROM wishlist
                  WHERE wishlist.UserWishlistId = '$id'";

        $result = $this->db->select($query);
        if($result == false){
            return $result;
        }else{
            $wishlistNotEmpty = true;
            return  $wishlistNotEmpty;
        }
    }



    }
 ?>
