<?php require_once '../DataBase/DB_Config.php' ?>

<?php   
class Article{
   
    private $db;


  public function __construct(){
      $this->db = new Database();
  } 

// TO-DO : show image when selected
public function articleInsert($data, $file){

$ArticleHeader    = mysqli_real_escape_string($this->db->link, $data['ArticleHeader'] );
$ArticleCategory  = mysqli_real_escape_string($this->db->link, $data['ArticleCategory'] );
$ArticleBody      = mysqli_real_escape_string($this->db->link, $data['ArticleBody'] );

// file path - where we store the image
$filePath = 'C:/wamp64/www/BabyBuy/admin/Web/';

// Image valid extentions
$allowedExtentions = array ('jpg', 'jpeg', 'png', 'gif');

// Types of messages we can get
$message = $errorType = $errorSize = $errorImage = "";

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

  }
  else{ //image was not selected
    $fileNameUnique = "";
    $errorImage .= "<span class = 'error'> Image Required...! </span>";
    return $errorImage;
  }

  // checking the file size is not above 5MB
  if ($fileSize > 5024000) {
    $errorSize .= "<span class = 'error'> File is too big! size must be under 5 Mb...! </span>";
    return $errorSize;
  }
  //file was selected but not an image
  // fileName not empty(file was selected) && file Extention not in allowd arr (no image was selected)
  else if( !empty($fileName) && !in_array($fileActualType,$allowedExtentions) ){ 
    $errorType .= "<span class = 'error'> File must be an Image...! </span>";
    return $errorType;
  }

  else if ($ArticleHeader == "" || $ArticleCategory == "Select Category" || $ArticleBody == "" ) {
    $message .= "<span class = 'error'> You cant have an empty field! </span>";
    return $message;
}

  else if( empty($message) ){ //No error all good
      
       $sqlValues .= "('".$fileNameUnique."', '".$filePath.$fileNameUnique."', '".$img_ref."'),";
       $store = move_uploaded_file($fileTmpName,$filePath.$fileNameUnique);
  }

} // foreach closing loop


if ( !empty($errorType) || !empty($errorSize) || !empty($errorImage) ){

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

    if ($result) { // checking both queries were inserted
        $message .= "<span class='success'>Article ".'"'.$ArticleHeader.'"'." Inserted Successfully.</span> ";
        return $message;

    }
    else{ // some query failed
      $message .= "<span class = 'error'>Article Not Inserted! </span>";
      return $message;
    }
}

} // closing articleInsert method --












} // closing Article class --
?>