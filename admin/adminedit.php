<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../DataBase/DB_Config.php' ?>

<?php 
// Getting the ArticleID from ArticleList page after clicking edit btn using the GET Method
if (!isset($_GET['adminId'])  ||  $_GET['adminId'] == NULL ) {

    // Reload catlist.php page script.. can't edit with null ID
    echo "<script>window.location = 'adminprofile.php'; </script>";

}else{
    $id = $_GET['adminId'];
}

?>


<?php

class Admin2{

    private $db;

    // Constructor
    public	function __construct()
    {
       $this->db = new Database(); // when creating new db intsnace its opening a connection 
    }

    public function getAdminById($id)
    {
        $query = "SELECT * FROM admins WHERE AdminID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function adminUpdate($data,$id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);

        if( empty($firstName) || empty($lastName) || empty($address) || empty($city) || empty($phone) || empty($email) )
        {
            $msg = "<span class='alert alert-danger' role='alert'> You Cant Have An empty Field..! </span>";
            return $msg;
        }else{
            $query =  "UPDATE admins SET 
            AdminFirstName = '$firstName',
            AdminLastName = '$lastName',
            AdminAddress = '$address',
            AdminCity = '$city',
            AdminPhone = '$phone',
            AdminPhone = '$email' WHERE AdminID = '$id'";;

            $update_row = $this->db->update($query); 

            if ($update_row) 
            {
                $msg = "<span class='alert alert-success' role='alert'>Admin Info Updated Successfully. Too See Changes Please Re-login</span> ";
                return $msg;

            }else{
                $msg = "<span class='alert alert-danger' role='alert'> Admin Info was not updated an error occurred! </span>";
                return $msg;
              }
        }

    }



}
?>

<?php
$admin = new Admin2();
if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $updateAdmin = $admin->adminUpdate($_POST,$id); // Getting the msg from the method
}

?>


<div class="grid_10">
            <div class="box round first grid">
                <h2>Update Admin</h2>
               <div class="block copyblock">
                
               <!-- Succsess or Error msg -->
               <?php   
                    if (isset($updateAdmin)) {
                        echo $updateAdmin;
                    }
                ?>


                <?php
                $getAdmin = $admin->getAdminById($id); // Getting a category by ID
                if ($getAdmin) {
                    
                    // Making result var an assoc array 
                    // (should be an array of 2 -> categoryId && categoryName)
                    $result = $getAdmin->fetch_assoc();
                   
                ?> <!-- Ending the php tag to write html code -->


                 <form action=" " method="post" >
                    <table class="form">					
                        <tr>
                            <td >
                                <label for="">New First Name: </label>
                            </td>

                            <td>
                                <label for="">New Last Name: </label>
                            </td>

                            <tr>
                                <td >
                                    <input type="text" name="firstName" value="<?php echo $result['AdminFirstName']; ?>" class="medium" style="width: fit-content;"/>
                                </td>

                                <td>  
                                    <input type="text" name="lastName" value="<?php echo $result['AdminLastName']; ?>" class="medium" style="width: fit-content;"/>
                                </td>
                            </tr>
                        </tr>

                        <tr>
                            <td >
                                <label for="">New Address: </label>
                            </td>
                            
                            <td>
                                <label for="">New City: </label>
                            </td>

                            <tr>
                                <td >
                                    <input type="text" name="address" value="<?php echo $result['AdminAddress']; ?>" class="medium" style="width: fit-content;"/>
                                </td>

                                <td>  
                                    <input type="text" name="city" value="<?php echo $result['AdminCity']; ?>" class="medium" style="width: fit-content;"/>
                                </td>
                            </tr>
                        </tr>

                        <tr>
                            <td >
                                <label for="">New Phone: </label>
                            </td>
                            
                            <td>
                                <label for="">New Email: </label>
                            </td>

                            <tr>
                                <td >
                                    <input type="text" name="phone" value="<?php echo $result['AdminPhone']; ?>" class="medium" style="width: fit-content;"/>
                                </td>

                                <td>  
                                    <input type="text" name="email" value="<?php echo $result['AdminEmail']; ?>" class="medium" style="width: fit-content;"/>
                                </td>
                            </tr>
                        </tr>



						<tr> 
                            <tr>   
                                <td>
                                    <input type="submit" name="submit" Value="Update" class="btn btn-green"/>
                                </td>
                            </tr>

                             <td>
                                <a href="adminprofile.php" class="btn btn-red">CANCEL</a>
                            </td> 

                        </tr>

                    </table>
                    </form>
                    <?php }  ?> <!-- closing the if statment with php tag -->

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>