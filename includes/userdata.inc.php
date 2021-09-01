<?php
require_once '../classes/User.php';

$user = new User();
$id = $_POST['user_id'];
$getUser = $user->getUserById($id);
$output = '';

$output .= '<div class="table-responsive">
                <table class="table table-bordered">';

while ($row = $getUser->fetch_assoc()) {
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
            </div>'; 

echo $output;
?>

