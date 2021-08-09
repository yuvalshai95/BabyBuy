<?php require_once '../DataBase/DB_Config.php' ?>

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
        $msg = "<span class = 'error'> Cant have an empty field...! </span>";
        return $msg;
       }else {

           // Syntax: INSERT INTO `table_name`(column_1,column_2,...) VALUES (value_1,...)
           $query = "INSERT INTO sub_category(CategoryID,SubCategoryName) VALUES ('$subCategory','$subName')";

           // Using the DataBase class update method
          // Running the query
           $subinsert = $this->db->insert($query);

           // Checking if the insert was good
           if ($subinsert) {
               $msg = "<span class='success'>Category ".'"'.$data['subCategoryName'].'"'." Inserted Successfully.</span> ";
               return $msg;
           }else {
               $msg = "<span class='error'>Sub-Category Not Inserted .</span> ";
               return $msg;
           }
       }
  }

















}
?>