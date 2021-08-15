<?php 
  $filepath = realpath(dirname(__FILE__));
  require_once ($filepath.'/../DataBase/DB_Config.php'); 
?>

<?php  
 
class Slider{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  }

  public function getAllSliders(){
    $query  = "SELECT *
               FROM slider
               ORDER BY slider.SliderID ASC";

    $result = $this->db->select($query);
    return $result; 
  }

  public function sliderInsert($data, $file){
      
$SliderTitle    = mysqli_real_escape_string($this->db->link, $data['title'] );

//$_FILES if we print we will see :
// Array( [name]=>filename.jpg [type]=>image/jpeg [tmp_name]=>C:\Wamp\tmp\phpA75A.tmp [error]=>0 [size]=>64851 )
$fileName = $file['image']['name'];
$fileTmpName = $file['image']['tmp_name'];
$fileSize = $file['image']['size'];
$fileError = $file['image']['error'];
$fileType = $file['image']['type'];

// fileExtention is an array with 2 variables: fileExtention[0]=filename, fileExtention[1]=file type
// explode is 'split' by ...
$fileExtention = explode('.', $fileName); 

// all file exttention should be lower case and not 'JPG'
// end -> php function to getting the last piece of data from an array
$fileActualExtention = strtolower(end($fileExtention));

$allowedExtentions = array ('jpg', 'jpeg', 'png', 'gif');

// in_array php function to check if a string is inside an array
// checking if the uploaded file has a valid file type
if (in_array($fileActualExtention, $allowedExtentions)) {

  // checking file errors 
  if ($fileError === 0) {

    // checking the file size is under 5MB
    if ($fileSize > 5000) {

      // checking if one or more field is empty
     if ($SliderTitle == "") {
      $msg = "<span  class='alert alert-danger' role='alert'> You cant have an empty field! </span>";
      return $msg;

     }else{ // all fields are valid- upload image to db

          $fileNameUnique = uniqid('', true).".".$fileActualExtention;
          $filePath = "Web/".$fileNameUnique;


          // Moving the file from temp location to new location
          move_uploaded_file($fileTmpName, $filePath);

          $query1 = "INSERT INTO slider(SliderTitle,SliderImage) 
                          VALUES ('$SliderTitle', '$filePath')";

          $inserted_row1 = $this->db->insert($query1);

          // checking both queries was inserted
          if ($inserted_row1) {
            $msg = "<span class='alert alert-success' role='alert'>Slider ".'"'.$SliderTitle.'"'." Inserted Successfully.</span> ";
            return $msg;

          }else{ // some query failed
            $msg = "<span  class='alert alert-danger' role='alert'>Slider Not Inserted! </span>";
            return $msg;
          }
     }

    }else{ // File size is too big
      $msg = "<span  class='alert alert-danger' role='alert'> File is too big! </span>";
      return $msg;
    }

  }else{ // Error uploading file
    $msg = "<span  class='alert alert-danger' role='alert'> There was an error uploading your file! </span>";
  return $msg;
  }

}else{ // File type is not valid
  $msg = "<span  class='alert alert-danger' role='alert'> This File Type Is Not Allowed! </span>";
  return $msg;
}

  }

 // Delete Slider By ID
 public function deleteSliderById($id, $name){

  // Syntax DELETE FROM table_name WHERE condition1 = value1
  $query = "DELETE FROM slider WHERE SliderID = '$id'";
  $deletedData = $this->db->delete($query);
  if ($deletedData) {
      $msg = "<span class='alert alert-success' role='alert'>Slider ".'"'.$name.'"'." Was Deleted Successfully.</span> ";
      return $msg;
  }else{
      $msg = "<span  class='alert alert-danger' role='alert'> Category was not deleted an error occurred! </span>";
      return $msg;
  }

}



 //TODO: לעשות אפשרות שאפשר לערוך רק את השם של הסליידר מבלי לעלות תמונה חדשה
 // כרגע שעושים עריכה של סליידר חייבים לערוך את השם ואת התמונה
 // Update slider name using id
 public function sliderUpdateNameAndImage($SliderName, $id, $file){

  // Remove the special characters from the
  // string using mysqli_real_escape_string
  // to send the sql query with no errors
  $SliderName = mysqli_real_escape_string($this->db->link, $SliderName);
  $id = mysqli_real_escape_string($this->db->link, $id);

  $fileName = $file['image']['name'];
  $fileTmpName = $file['image']['tmp_name'];

  $fileExtention = explode('.', $fileName); 

  $fileActualExtention = strtolower(end($fileExtention));

  $allowedExtentions = array ('jpg', 'jpeg', 'png', 'gif');



  //error msg if empty field
  if (empty($SliderName)) {
      $msg = "<span  class='alert alert-danger' role='alert'> Slider Name Field cant be empty! </span>";
      return $msg;

}else{

  if (in_array($fileActualExtention, $allowedExtentions)){
    $fileNameUnique = uniqid('', true).".".$fileActualExtention;
  $filePath = "Web/".$fileNameUnique;

    // Syntax UPDATE table_name SET field1 = new-value1
    $query = "UPDATE slider SET SliderTitle = '$SliderName', SliderImage = ' $filePath'  WHERE SliderID = '$id'";

    // Using the DataBase class update method
    // Running the query
    $update_row = $this->db->update($query); 

    // Checking if the insert was good
    if ($update_row) {
      
      // Moving the file from temp location to new location
      move_uploaded_file($fileTmpName, $filePath);

      $msg = "<span class='alert alert-success' role='alert'>Slider ".'"'.$SliderName.'"'." Updated Successfully.</span> ";
      return $msg;

    }else{
      $msg = "<span  class='alert alert-danger' role='alert'> Slider was not updated an error occurred! </span>";
      return $msg;
    }
  }else{
    $msg = "<span  class='alert alert-danger' role='alert'> This File Type Is Not Allowed! </span>";
    return $msg;
  }

  
  }
}


  // Get a slider by id from db
  public function getSliderByID($id){
    $query = "SELECT * FROM slider WHERE SliderID = '$id'";
    $result = $this->db->select($query);
    return $result;
}


















}
?>