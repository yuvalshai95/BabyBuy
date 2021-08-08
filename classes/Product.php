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
               INNER JOIN category ON product.ProductCategory  = category.CategoryID
               INNER JOIN users ON product.UserID = users.UserID
               ORDER BY product.ProductID DESC";

    $result = $this->db->select($query);
    return $result; 
  }




 // Delete Product By ID
 public function deleteProductById($id, $name){

  // Syntax DELETE FROM table_name WHERE condition1 = value1
  $query = "DELETE FROM product WHERE ProductID = '$id'";
  $deletedData = $this->db->delete($query);
  if ($deletedData) {
      $msg = "<span class='success'>Product ".'"'.$name.'"'." Was Deleted Successfully.</span> ";
      return $msg;
  }else{
      $msg = "<span class = 'error'> Product was not deleted an error occurred! </span>";
      return $msg;
  }

}















}
?>