<?php 
  $filepath = realpath(dirname(__FILE__));
  require_once ($filepath.'/../DataBase/DB_Config.php');
 ?>

<?php   
class SubCategory{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  }  


  public function subCategoryInsert($data){ 

    // Remove the special characters from the
    // string using mysqli_real_escape_string
    // to send the sql query with no errors
    $subName = mysqli_real_escape_string($this->db->link, $data['subCategoryName']);
    $subCategory = mysqli_real_escape_string($this->db->link, $data['Category']);

    //error msg if empty field
    if (empty($subName) ||  $subCategory == "Select Category") {
        $msg = "<span cl class='alert alert-danger' role='alert'> Cant have an empty field...! </span>";
        return $msg;
       }else {

           // Syntax: INSERT INTO `table_name`(column_1,column_2,...) VALUES (value_1,...)
           $query = "INSERT INTO sub_category(CategoryID,SubCategoryName) VALUES ('$subCategory','$subName')";

           // Using the DataBase class update method
          // Running the query
           $subinsert = $this->db->insert($query);

           // Checking if the insert was good
           if ($subinsert) {
               $msg = "<span class='alert alert-success' role='alert'>Category ".'"'.$data['subCategoryName'].'"'." Inserted Successfully.</span> ";
               return $msg;
           }else {
               $msg = "<span  class='alert alert-danger' role='alert'>Sub-Category Not Inserted .</span> ";
               return $msg;
           }
       }
  }

  // Get all sub categories from db
  public function getAllSubCategories(){
    $query = "SELECT sub_category.*, category.CategoryName
              FROM sub_category
              INNER JOIN category on sub_category.CategoryID  = category.CategoryID 
              ORDER BY SubCategoryID DESC";

    $result = $this->db->select($query);
    return $result;
}


// Delete Sub-Category By ID
  public function deleteSubCategoryById($id, $name){

    // Syntax DELETE FROM table_name WHERE condition1 = value1
    $query = "DELETE FROM sub_category WHERE SubCategoryID = '$id'";
    $deletedData = $this->db->delete($query);
    if ($deletedData) {
        $msg = "<span class='alert alert-success' role='alert'>Sub-Category ".'"'.$name.'"'." Was Deleted Successfully.</span> ";
        return $msg;
    }else{
        $msg = "<span  class='alert alert-danger' role='alert'> Sub-Category was not deleted an error occurred! </span>";
        return $msg;
    }

}



  // Get a sub category by id from db
  public function getSubCategoryByID($id){
    $query = "SELECT * FROM sub_category WHERE SubCategoryID  = '$id'";
    $result = $this->db->select($query);
    return $result;
}



  // Update category name using id
  public function subCategoryUpdate($data,$id){

    // Remove the special characters from the
    // string using mysqli_real_escape_string
    // to send the sql query with no errors
    $subCategoryName = mysqli_real_escape_string($this->db->link, $data['subCategoryName']);
    $mainCategory = mysqli_real_escape_string($this->db->link, $data['Category']);
    $id = mysqli_real_escape_string($this->db->link, $id);

    //error msg if empty field
    if (empty($subCategoryName) || $mainCategory =="Select Category") {
        $msg = "<span  class='alert alert-danger' role='alert'> Cant have an empty field...! </span>";
        return $msg;

  }else{
      // Syntax UPDATE table_name SET field1 = new-value1
      $query = "UPDATE sub_category SET SubCategoryName = '$subCategoryName',CategoryID='$mainCategory' WHERE SubCategoryID  = '$id'";

      // Using the DataBase class update method
      // Running the query
      $update_row = $this->db->update($query); 

      // Checking if the insert was good
      if ($update_row) {
        $msg = "<span class='alert alert-success' role='alert'>Sub-Category ".'"'.$subCategoryName.'"'." Updated Successfully.</span> ";
        return $msg;

      }else{
        $msg = "<span  class='alert alert-danger' role='alert'> Sub-Category was not updated an error occurred! </span>";
        return $msg;
      }
  }
}





  // Get a sub category by id from db
  public function getSubByMainCategoryID($id){
    $query = "SELECT sub_category.*, category.CategoryName
              FROM sub_category 
              INNER JOIN category on sub_category.CategoryID  = category.CategoryID 
              WHERE sub_category.CategoryID   = '$id'";
    $result = $this->db->select($query);
    return $result;
}















}
?>