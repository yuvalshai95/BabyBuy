<?php require_once '../DataBase/DB_Config.php' ?>

<?php   
class Article{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  } 


public function articleInsert($data, $file){

$ArticleHeader    = mysqli_real_escape_string($this->db->link, $data['ArticleHeader'] );
$ArticleCategory  = mysqli_real_escape_string($this->db->link, $data['ArticleCategory'] );
$ArticleBody      = mysqli_real_escape_string($this->db->link, $data['ArticleBody'] );

//$_FILES if we print we will see :
// Array( [name]=>filename.jpg [type]=>image/jpeg [tmp_name]=>C:\Wamp\tmp\phpA75A.tmp [error]=>0 [size]=>64851 )
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

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
     if ($ArticleHeader == "" || $ArticleCategory == "" || $ArticleBody == "" ) {
      $msg = "<span class = 'error'> You cant have an empty field! </span>";
      return $msg;

     }else{ // all fields are valid- upload image to db

          $fileNameUnique = uniqid('', true).".".$fileActualExtention;
          $filePath = 'C:/wamp64/www/BabyBuy/admin/Web/'.$fileNameUnique;
          

          // Moving the file from temp location to new location
          move_uploaded_file($fileTmpName, $filePath);

          $timestamp = date("Y-m-d H:i:s");
          $query1 = "INSERT INTO articles(ArticleHeader,ArticleCategory,ArticleBody,ArticleTimeStamp) 
                          VALUES ('$ArticleHeader', '$ArticleCategory', '$ArticleBody', ' $timestamp')";
          
          $inserted_row1 = $this->db->insert($query1);

          $result = $this->getArticleByTitleAndTimeStamp($ArticleHeader, $timestamp);
          $id = $result->fetch_assoc();
          $ArticleID = $id['ArticleID'];

          $query2 = "INSERT INTO articles_images(ArticleID,ImageName,ImagePath) 
                        VALUES ('$ArticleID', '$fileNameUnique', '$filePath')";

          $inserted_row2 = $this->db->insert($query2);

          // checking both queries was inserted
          if ($inserted_row1 && $inserted_row2) {
            $msg = "<span class='success'>Article ".'"'.$ArticleHeader.'"'." Inserted Successfully.</span> ";
            return $msg;

          }else{ // some query failed
            $msg = "<span class = 'error'>Article Not Inserted! </span>";
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


public function getArticleByTitleAndTimeStamp($title, $time){
      $query = "SELECT * FROM articles WHERE ArticleHeader = '$title' AND ArticleTimeStamp = '$time'";
      $result = $this->db->select($query);
      return $result;
  }






  
}
?>