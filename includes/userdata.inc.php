<?php
require_once '../classes/User.php';

$user = new User();
$id = $_POST['user_id'];
$getUser = $user->getUserById($id);
$output = '';


$output .= '<div class="table-responsive">
                <table class="table table-bordered">';

while ($row = $getUser->fetch_assoc()) {

     // get user city and repalce all white spaces with "+" sign
     $city = $row['City'];
     $city = str_replace(" ","+",$city);

     // get user address and repalce all white spaces with "+" sign
     $address = $row['Address'];
     $address = str_replace(" ","+",$address);

     // combine user city and address
     $full_address = $city ."+".$address;




    $output .='
        <tr>
            <td width="30%"><label for=""></label>Name</td>
            <td width = "70%">'.$row['FirstName'].' '.$row['LastName'].'</td>
        </tr>

        <tr>
            <td width="30%"><label for=""></label>Address</td>
            <td width = "70%">'.$row['Address'].'</td>
        </tr>

        <tr>
            <td width="30%"><label for=""></label>City</td>
            <td width = "70%">'.$row['City'].'</td>
        </tr>

        <tr>
            <td width="30%"><label for=""></label>Mobile Phone</td>
            <td width = "70%">'.$row['PhoneNumber'].'</td>
        </tr>



    ';
}
$output .='     </table>
                    <div align="center" class="resp-container" style="display:block;">
                        <iframe  src="https://maps.google.com/maps?q='.$full_address.'&output=embed" ></iframe>
                    </div> 
            </div>'; 

echo $output;
?>

