<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Slider.php'; ?>

<?php 
// Getting the categoryID from catlist page after clicking edit btn using the GET Method
if (!isset($_GET['sliderId'])  ||  $_GET['sliderId'] == NULL ) {

    // Reload catlist.php page script.. can't edit with null ID
    echo "<script>window.location = 'sliderlist.php'; </script>";

}else{
    $id = $_GET['sliderId'];
}

?>



<?php
    $slider = new Slider(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $SliderName = $_POST['SliderName']; // Input from the form to send to the db
        $SliderImage = $_FILES;

        $updateSlider = $slider->sliderUpdateNameAndImage($SliderName, $id, $SliderImage); // Getting the msg from the method
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Slider</h2>
               <div class="block copyblock">
                
               <!-- Succsess or Error msg -->
               <?php   
                    if (isset($updateSlider)) {
                        echo $updateSlider;
                    }
                ?>


                <?php
                $getSlider = $slider->getSliderByID($id); // Getting a slider by ID
                if ($getSlider) {
                    
                    // Making result var an assoc array 
                    // (should be an array of 2 -> sliderID && SliderTitle)
                    $result = $getSlider->fetch_assoc();
                   
                ?> 


                 <form action=" " method="POST" enctype="multipart/form-data">
                    <table class="form" >					
                        <tr>
                            <td> 
                                <label for="">Enter New Slider Name: </label> 
                            </td>

                            <td>
                                <input type="text" name="SliderName" value="<?php echo $result['SliderTitle']; ?>" class="medium" />
                            </td>

                            <tr>
                            
                                <td>
                                    <label for="">Enter New Slider Image: </label> 
                                </td>

                                <td> 
                                    <input type="file" name="image" onchange="displayImage(this)" id="image" /> 
                                </td>

                                <!-- Image Preview -->
                                <tr>
                                    <td></td>
                                    <td> 
                                        <div class="images-display" id="images">
                                            <img src = "img/photo.jpg">           
                                        </div>
                                    </td>
                                </tr> 
                                <!-- Image Preview -->

                            </tr>
                        </tr>

						<tr> 
                            <!-- CANCEL BTN -->
                            <td style="width: 200px">
                                <a href="sliderlist.php" class="btn btn-red">CANCEL</a>
                            </td>
                            <!-- CANCEL BTN -->

                            <!-- UPDATE BTN -->
                            <td>
                                <input type="submit" name="submit" Value="UPDATE" class="btn btn-green"/>
                            </td>
                            <!-- UPDATE BTN -->
                            
                        </tr>

                    </table>
                    </form>
                    <?php }  ?> <!-- closing the if statment with php tag -->

                </div>
            </div>
        </div>


    <!-- Image Preview -->
    <script src="js/imagePrev.js"></script>
    <!-- Image Preview -->

<?php include 'inc/footer.php';?>