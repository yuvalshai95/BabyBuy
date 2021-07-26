<?php require_once '../DataBase/DB_Config.php' ?>

<?php   
class Product{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  }

  public function getAllProducts(){
    $query  = "SELECT product.*, category.CategoryName, users.FirstName
               FROM product
               INNER JOIN category ON product.ProductID = category.CategoryID
               INNER JOIN users ON product.UserID = users.UserID
               ORDER BY product.ProductID DESC";

    $result = $this->db->select($query);
    return $result; 
  }




















}
?>