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

           // Running the query
           $catinsert = $this->db->insert($query);

           // Checking if the insert was good
           if ($catinsert) {
               $msg = "<span class='success'>Category Inserted Successfully.</span> ";
               return $msg;
           }else {
               $msg = "<span class='error'>Category Not Inserted .</span> ";
               return $msg;
           }
       }
  }














}
?>