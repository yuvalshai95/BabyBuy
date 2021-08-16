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
      














    }
 ?>
