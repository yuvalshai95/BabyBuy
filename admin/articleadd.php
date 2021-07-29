<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Article.php';?>
<?php include '../classes/Category.php';?>

<?php
    $article = new Article(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){

        $insertArticle = $article->articleInsert($_POST, $_FILES); // Getting the msg from the method
    }
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Article</h2>
        <div class="block">  
            
        <?php
            if (isset($insertArticle)) {
                echo $insertArticle;
            }
        ?>

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Article Title</label>
                    </td>
                    <td>
                        <input type="text" name="ArticleHeader" placeholder="Enter Title Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="ArticleCategory" aria-placeholder="TEXT">
                            <option>Select Category</option>

                            <?php
                                $cat = new Category();
                                $getCategories = $cat->getAllCategories();
                                if ($getCategories) {
                                    while ($result = $getCategories->fetch_assoc()) {
                                        
                            ?>
                            <option value=" <?= $result['CategoryID'];?> "> <?= $result['CategoryName'];?> </option>
                            <?php   } } ?>      

                        </select>
                    </td>
                </tr>
				
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="ArticleBody"></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Images</label>
                    </td>
                    <td>
                        <!-- making image[] array to hold multiple images and JS to display preview -->
                        <input type="file" name="image[]" onchange="displayImage(this)" id="image" multiple/>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <div class="images-display" id="images">
                                        <img src = "img/photo.jpg">
                                        <img src = "img/photo.jpg">
                                        <img src = "img/photo.jpg">
                                        
                        </div>
                    
                    </td>
                </tr>
	
                <!-- Submit BTN START-->
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
                <!-- Submit BTN END-->
                
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


