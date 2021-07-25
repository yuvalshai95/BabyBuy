<?php require_once '../DataBase/DB_Config.php' ?>

<?php   
class Product{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  }

  public function getAllProducts(){
    $query  = "SELECT * FROM product ORDER BY ProductID DESC";
    $result = $this->db->select($query);
    return $result; 
  }




















}
?>