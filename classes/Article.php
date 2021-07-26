<?php require_once '../DataBase/DB_Config.php' ?>

<?php   
class Article{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  } 

// TO-DO : Muiltiple images
public function articleInsert($data, $file){

$ArticleHeader    = mysqli_real_escape_string($this->db->link, $data['ArticleHeader'] );
$ArticleCategory  = mysqli_real_escape_string($this->db->link, $data['ArticleCategory'] );
$ArticleBody      = mysqli_real_escape_string($this->db->link, $data['ArticleBody'] );

// file path - where we store the image
$filePath = 'C:/wamp64/www/BabyBuy/admin/Web/';

// Image valid extentions
$allowedExtentions = array ('jpg', 'jpeg', 'png', 'gif');

$message = $errorType = $errorSize = $errorImage = "";

// generate a random number
$img_ref = rand(); 

// values to send to the query
$sqlValues = ""; 



//$_FILES if we print we will see :
// Array( [name]=>filename.jpg [type]=>image/jpeg [tmp_name]=>C:\Wamp\tmp\phpA75A.tmp [error]=>0 [size]=>64851 )
foreach ($file['image']['tmp_name'] as $imageKey => $imageValue){

  $fileName = $file['image']['name'][$imageKey]; // = filename.jpg
  $fileTmpName = $file['image']['tmp_name'][$imageKey]; // = C:\Wamp\tmp\phpA75A.tmp
  $fileSize = $file['image']['size'][$imageKey]; // = 64851
  
  // pathinfo -> Returns information about a file path
  // PATHINFO_EXTENSION -> give for example: 'jpg', 'png'
  $fileType = pathinfo($filePath.$fileName, PATHINFO_EXTENSION); // = jpg

  // check if image was selected
  if ($fileName != '') {
      // Get image new unique name
      $fileNameUnique = uniqid('', true).".".$fileType;

  }
  else{ //image was not selected
    $fileNameUnique = "";
    $errorImage .= "<span class = 'error'> Image Required...! </span>";
    return $errorImage;
  }

  // checking the file size is above 5MB
  if ($fileSize > 5024000) {
    $errorSize .= "<span class = 'error'> File is too big! size must be under 5 Mb...! </span>";
    return $errorSize;
  }
  //file was selected but not an image
  // fileName not empty(file was selected) && file Extention not in allowd arr (no image was selected)
  else if( empty($fileName)==false && in_array($fileType,$allowedExtentions)==false ){ 
    $errorType .= "<span class = 'error'> File must be an Image...! </span>";
    return $errorType;
  }
  else if( empty($message) ){ //No error all good
      
       $sqlValues .= "('".$fileNameUnique."', '".$filePath.$fileNameUnique."', '".$img_ref."'),";
       $store = move_uploaded_file($fileTmpName,$filePath.$fileNameUnique);
  }
} // foreach closing loop

if ($ArticleHeader == "" || $ArticleCategory == "" || $ArticleBody == "" ) {
      $message .= "<span class = 'error'> You cant have an empty field! </span>";
      return $message;
}
elseif ( !empty($errorType) || !empty($errorSize) || !empty($errorImage) ){

  $message .= $errorType.= $errorSize.= $errorImage;
  return $message;

  
}
else{
    $timestamp = date("Y-m-d H:i:s");
    $sqlIns = "INSERT INTO articles(ArticleHeader,ArticleCategory,ArticleBody,ArticleTimeStamp,ImageRefrence) 
                VALUES ('$ArticleHeader', '$ArticleCategory', '$ArticleBody', ' $timestamp', '".$img_ref."');";

    $sqlIns .= "INSERT INTO articles_images(ImageName,ImagePath,ImageRefrence) 
                      VALUES $sqlValues";
    
    $sqlIns = rtrim($sqlIns, ",");

    $result = mysqli_multi_query($this->db->link, $sqlIns);

    if ($result) { // checking both queries was inserted
        $message .= "<span class='success'>Article ".'"'.$ArticleHeader.'"'." Inserted Successfully.</span> ";
        return $message;

    }
    else{ // some query failed
      $message .= "<span class = 'error'>Article Not Inserted! </span>";
      return $message;
    }
}



/*

//$_FILES if we print we will see :
// Array( [name]=>filename.jpg [type]=>image/jpeg [tmp_name]=>C:\Wamp\tmp\phpA75A.tmp [error]=>0 [size]=>64851 )
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

// fileExtention is an array with 2 variables: fileExtention[0]=filename, fileExtention[1]=file extention
// explode is 'split' by ...
$fileExtention = explode('.', $fileName); 

// all file exttention should be lower case and not 'JPG'
// end -> php function to getting the last piece of data from an array
// fileActualExtention = "jpg" 
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
*/
}







  
}
?>