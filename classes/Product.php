<?php 
  $filepath = realpath(dirname(__FILE__));
  require_once ($filepath.'/../DataBase/DB_Config.php');
?>

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
      $msg = "<span class='alert alert-success' role='alert'>Product ".'"'.$name.'"'." Was Deleted Successfully.</span> ";
      return $msg;
  }else{
      $msg = "<span  class='alert alert-danger' role='alert'> Product was not deleted an error occurred! </span>";
      return $msg;
  }

}

public function getRecentProducts(){
  $query = "SELECT *
            FROM product
            ORDER BY ProductTime DESC 
            LIMIT 4";
  $result = $this->db->select($query);
  return $result;
}


public function getProductByIdAndUser($pid, $uid){
  $query = "SELECT product.*, users.*, category.*
            FROM product
            INNER JOIN users on product.UserID = users.UserID
            INNER JOIN category on product.ProductCategory = category.CategoryID
            WHERE product.ProductID='$pid' AND users.UserID='$uid'"  ;
  $result = $this->db->select($query);
  return $result;
}


public function getSimilarProducts($category_id){
  $query = "SELECT * FROM product WHERE product.ProductCategory = '$category_id' LIMIT 8";
  $result = $this->db->select($query);
  return $result;
}

public function getUserProduct($pdId , $userId){
  $query = "SELECT users.* 
            FROM product 
            INNER JOIN users ON product.UserID = users.UserID 
            WHERE product.ProductID = '$pdId' AND product.UserID = '$userId'";
  $result = $this->db->select($query);
  return $result;
}


public function updateProductDate($userId , $pdId){
  $todayDate =  date('Y-m-d H:i:s');
  $query = "UPDATE product
            SET ProductTime = '$todayDate'
            WHERE UserID = '$userId' AND ProductID = '$pdId'";
  $this->db->update($query);
}


public function getAllWishlist($currentuserId){
  $query = "SELECT *
            FROM wishlist
            WHERE wishlist.UserWishlistId = '$currentuserId'";

  $result = $this->db->select($query);

  return $result;

}

public function InsertToWishlist($wishPd, $wishOwnerid , $currentUserId){
  
  $query = "INSERT INTO wishlist(ProductID,UserID,UserWishlistId) VALUES (?,?,?)";
  $stmt = $stmt = mysqli_stmt_init($this->db->link);
  mysqli_stmt_prepare($stmt,$query);
  mysqli_stmt_bind_param($stmt,"iii", $wishPd,$wishOwnerid,$currentUserId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_get_result($stmt);

}






}
?>