<?php require_once 'DataBase/DB_Config.php' ?>

<?php  
 
class SliderForHomePage{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  }

  public function getAllSliders(){
    $query  = "SELECT *
               FROM slider";
               //ORDER BY slider.SliderID DESC

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
      $msg = "<span class = 'error'> You cant have an empty field! </span>";
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
            $msg = "<span class='success'>Slider ".'"'.$SliderTitle.'"'." Inserted Successfully.</span> ";
            return $msg;

          }else{ // some query failed
            $msg = "<span class = 'error'>Slider Not Inserted! </span>";
            return $msg;
          }
     }

    }else{ // File size is too big
      $msg = "<span class = 'error'> File is too big! </span>";
      return $msg;
    }

  }else{ // Error uploading file
    $msg = "<span class = 'error'> There was an error uploading your file! </span>";
  return $msg;
  }

}else{ // File type is not valid
  $msg = "<span class = 'error'> This File Type Is Not Allowed! </span>";
  return $msg;
}

  }















}
?>