<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Slider.php';?>

<?php
    $slider = new Slider(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){

        $insertSlider = $slider->sliderInsert($_POST, $_FILES); // Getting the msg from the method
    }
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
    <div class="block">  

        <?php
            if (isset($insertSlider)) {
                echo $insertSlider;
            }
        ?>


         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" onchange="displayImage(this)" id="image" />
                    </td>
                    
                </tr>
                

                <!-- Image Preview -->
                <tr><td><td>    
                        <div class="images-display" id="images">
                        <img src = "img/photo.jpg">           
                        </div>
                </td></td></tr>
                <!-- Image Preview -->


                <!-- Submit BTN START-->
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />   
                    </td>

                </tr>
                <!-- Submit BTN START-->

            </table>
            </form>
        </div>
    </div>
</div>


<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->

<!-- Image Preview -->
<script src="js/imagePrev.js"></script>
<!-- Image Preview -->

<?php include 'inc/footer.php';?>