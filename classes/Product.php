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
            FROM product p
            ORDER BY ProductTime DESC 
            LIMIT 8";
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
  $stmt = mysqli_stmt_init($this->db->link);
  mysqli_stmt_prepare($stmt,$query);
  mysqli_stmt_bind_param($stmt,"iii", $wishPd,$wishOwnerid,$currentUserId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_get_result($stmt);

}

public function deleteFromWishlist($id){
  $query = "DELETE FROM wishlist
            WHERE wishlist.ID = ?";
  $stmt = mysqli_stmt_init($this->db->link);
  mysqli_stmt_prepare($stmt,$query);
  mysqli_stmt_bind_param($stmt,"i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_get_result($stmt);

}

public function getProductBySearch($key){
  $query = "SELECT *
            FROM product
            WHERE product.ProductName LIKE '%$key%' 
            OR product.Description LIKE '%$key%' ";
  $result = $this->db->select($query);
  return $result;
}

public function productInsert($userId, $pdCategory, $pdName, $pdDescription,$pdPickUp,$pdAge, $pdPrice, $pdStatus,$pdCondition,$file){

  $pdName         = mysqli_real_escape_string($this->db->link, $pdName);
  $pdDescription  = mysqli_real_escape_string($this->db->link, $pdDescription);
  $pdPrice       = mysqli_real_escape_string($this->db->link, $pdPrice);

// file path - where we store the image
$filePath = "../admin/Web/";

// Image valid extentions
$allowedExtentions = array ('jpg', 'jpeg', 'png', 'gif');

// generate a random number for image_refrence
$img_ref = rand(); 

// values to send to the query in a loop
$sqlValues = ""; 

//$_FILES if we print we will see :
// Array( [name]=>filename.jpg [type]=>image/jpeg [tmp_name]=>C:\Wamp\tmp\phpA75A.tmp [error]=>0 [size]=>64851 )
foreach ($file['image']['tmp_name'] as $imageKey => $imageValue){

  $fileName = $file['image']['name'][$imageKey]; // = filename.jpg
  $fileTmpName = $file['image']['tmp_name'][$imageKey]; // = C:\Wamp\tmp\phpA75A.tmp
  $fileSize = $file['image']['size'][$imageKey]; // = 64851

  // explode is 'split' by a 'char' of ur choosing
  // fileType is now an array with 2 variables: fileType[0]=filename, fileType[1]=file extention
  $fileType = explode('.', $fileName);

// all file extention should be lower case and not 'JPG'
// end -> php function to getting the last piece of data from an array
// fileActualType = "jpg" 
$fileActualType = strtolower(end($fileType));

  // check if image was selected
if ($fileName != '') {

    // Get image new unique name
    $fileNameUnique = uniqid('', true).".".$fileActualType;

} else{ //image was not selected
    $fileNameUnique = "";

    // Send user back to add page with error msg
    header("location: ../addproduct.php?error=emptyImage");

    exit(); // Stop the script from running

  }

  // checking the file size is not above 5MB
  if ($fileSize > 5024000) {
    // Send user back to add page with error msg
    header("location: ../addproduct.php?error=bigfile");

    exit(); // Stop the script from running
  }

  //file was selected but not an image
  // fileName not empty(file was selected) && file Extention not in allowd arr (no image was selected)
  else if( !empty($fileName) && !in_array($fileActualType,$allowedExtentions) ){ 

    // Send user back to add page with error msg
    header("location: ../addproduct.php?error=notImage");

    exit(); // Stop the script from running
  }


// No errors
$sqlValues .= "('".$fileNameUnique."', '".$filePath.$fileNameUnique."', '".$img_ref."'),";
$store = move_uploaded_file($fileTmpName,$filePath.$fileNameUnique);


}

$timestamp = date("Y-m-d H:i:s");

$sqlIns = "INSERT INTO product(UserID,ProductCategory,ProductName,Description,PickupOptions,Age,Price,Status,ProductCondition,ImageRefrence) 
            VALUES ('$userId','$pdCategory','$pdName','$pdDescription','$pdPickUp','$pdAge','$pdPrice','$pdStatus','$pdCondition','".$img_ref."');";

$sqlIns .= "INSERT INTO users_products_images(ImageName,ImagePath,ImageRefrence) 
            VALUES $sqlValues";

$sqlIns = rtrim($sqlIns, ","); 

$result = mysqli_multi_query($this->db->link, $sqlIns);

if ($result) { // checking both queries were inserted

  // Send user back to add page with error msg
  header("location: ../addproduct.php?error=none");

  exit(); // Stop the script from running

}
else{ // some query failed

  // Send user back to add page with error msg
  header("location: ../addproduct.php?error=failed");

  exit(); // Stop the script from running
}

}

public function getAllImagesByProductId($id){
  $query = "SELECT *
            FROM users_products_images u
            WHERE u.ImageRefrence IN (SELECT p.ImageRefrence
                                      FROM product p
                                      WHERE p.ProductID = '$id')";

  $result = $this->db->select($query);

  return $result;
  
}

public function getSingleImagesByProductId($id){
  $query = "SELECT *
            FROM users_products_images u
            WHERE u.ImageRefrence IN (SELECT p.ImageRefrence
                                      FROM product p
                                      WHERE p.ProductID = '$id')
            LIMIT 1";

  $result = $this->db->select($query);

  return $result;
  
}

public function isProductInWishlist($pd_id,$user_id){
  $query = "SELECT *
            FROM wishlist
            WHERE wishlist.ProductID = '$pd_id' AND wishlist.UserID = '$user_id'";
  
  $result = $this->db->select($query);
  if ($result !== false) {
    return true;
  }
  else{
    return false;
  }
}



}
?>