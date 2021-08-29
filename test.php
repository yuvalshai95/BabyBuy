<form action="" method="POST">
    <input type="checkbox" name="animal[]" value="Cat" style="padding: 3em;">cat</input>
    <input type="checkbox" name="animal[]" value="Dog">dog</input>
    <input type="checkbox" name="animal[]" value="Bear">bear</input>
    <input type="submit" name="submit" value="send">
</form>

<?php
    $arr = array();
    $s = "";

    foreach ($_POST['animal'] as $animal) {
        array_push($arr,$animal);
        $s .= $animal.",";
    }
    print_r($arr);
    $s = rtrim($s,",");
    $s = str_replace(',',' ',$s);
    
    echo "S:".$s;


    $email = "yuvalshai@gmail.com";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "NO";
    }else{
        echo "OK";
    }
  
    

?>