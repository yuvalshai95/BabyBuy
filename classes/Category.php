<?php require_once '../DataBase/DB_Config.php' ?>


<?php   
class Category{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  }  


   public function catInsert($catName){ 

    // Remove the special characters from the
    // string using mysqli_real_escape_string
    // to send the sql query with no errors
    $catName = mysqli_real_escape_string($this->db->link, $catName);

    //error msg if empty field
    if (empty($catName)) {
        $msg = "<span class = 'error'> Category Field cant be empty! </span>";
        return $msg;
       }else {

           // Syntax: INSERT INTO `table_name`(column_1,column_2,...) VALUES (value_1,...)
           $query = "INSERT INTO category(CategoryName) VALUES ('$catName')";

           // Using the DataBase class update method
          // Running the query
           $catinsert = $this->db->insert($query);

           // Checking if the insert was good
           if ($catinsert) {
               $msg = "<span class='success'>Category ".'"'.$catName.'"'." Inserted Successfully.</span> ";
               return $msg;
           }else {
               $msg = "<span class='error'>Category Not Inserted .</span> ";
               return $msg;
           }
       }
  }

  // Get all categories names from db
  public function getAllCategories(){
      $query = "SELECT * FROM category ORDER BY CategoryID DESC";
      $result = $this->db->select($query);
      return $result;
  }


  // Get a category by id from db
  public function getCategoryByID($id){
      $query = "SELECT * FROM category WHERE CategoryID = '$id'";
      $result = $this->db->select($query);
      return $result;
  }


  // Update category name using id
  public function categoryUpdateName($CategoryName, $id){

    // Remove the special characters from the
    // string using mysqli_real_escape_string
    // to send the sql query with no errors
    $CategoryName = mysqli_real_escape_string($this->db->link, $CategoryName);
    $id = mysqli_real_escape_string($this->db->link, $id);

    //error msg if empty field
    if (empty($CategoryName)) {
        $msg = "<span class = 'error'> Category Field cant be empty! </span>";
        return $msg;

  }else{
      // Syntax UPDATE table_name SET field1 = new-value1
      $query = "UPDATE category SET CategoryName = '$CategoryName' WHERE CategoryID = '$id'";

      // Using the DataBase class update method
      // Running the query
      $update_row = $this->db->update($query); 

      // Checking if the insert was good
      if ($update_row) {
        $msg = "<span class='success'>Category ".'"'.$CategoryName.'"'." Updated Successfully.</span> ";
        return $msg;

      }else{
        $msg = "<span class = 'error'> Category was not updated an error occurred! </span>";
        return $msg;
      }
  }
}


 // Delete Category By ID
  public function deleteCategoryById($id, $name){

    // Syntax DELETE FROM table_name WHERE condition1 = value1
    $query = "DELETE FROM category WHERE CategoryID = '$id'";
    $deletedData = $this->db->delete($query);
    if ($deletedData) {
        $msg = "<span class='success'>Category ".'"'.$name.'"'." Was Deleted Successfully.</span> ";
        return $msg;
    }else{
        $msg = "<span class = 'error'> Category was not deleted an error occurred! </span>";
        return $msg;
    }

}










}
?>