<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Article.php'; ?>
<?php require_once '../classes/Category.php'; ?>

<?php 
// Getting the ArticleID from ArticleList page after clicking edit btn using the GET Method
if (!isset($_GET['articleId'])  ||  $_GET['articleId'] == NULL ) {

    // Reload catlist.php page script.. can't edit with null ID
    echo "<script>window.location = 'articlelist.php'; </script>";

}else{
    $id = $_GET['articleId'];
}

?>



<?php
    $article = new Article(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $articleName = $_POST['ArticleName']; // Input from the form to send to the db
        $articleBody = $_POST['ArticleBody'];
        $articleCategory = $_POST['Category'];

        $updateArticle = $article->articleUpdate($articleName, $articleBody,  $articleCategory, $id); // Getting the msg from the method
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Article</h2>
               <div class="block">
                
               <!-- Succsess or Error msg -->
               <?php   
                    if (isset($updateArticle)) {
                        echo $updateArticle;
                    }
                ?>


                <?php
                $getArticle = $article->getArticleByID($id); // Getting a article by ID
                if ($getArticle) {
                    
                    // Making result var an assoc array 
                    // (should be an array of 2 -> categoryId && categoryName)
                    $result = $getArticle->fetch_assoc();
                   
                ?> <!-- Ending the php tag to write html code -->


                 <form action=" " method="post" >
                    <table class="form">					
                        <tr>
                             <tr><td><td> <label for="">New Article Name: </label></td></td></tr>
                             
                            <td></td>
                                
                            <td>
                                <input type="text" name="ArticleName" value="<?php echo $result['ArticleHeader']; ?>" class="medium" />
                            </td>

                        </tr>
                            <tr>   
                                <td style="width: 100px;">
                                    
                                </td>

                                <td>
                                    <label for="">New Article Text: </label>
                                    <textarea class="tinymce" name="ArticleBody" setContent="sdsd">
                                        <?php echo $result['ArticleBody']; ?>
                                    </textarea>
                                </td>
                            </tr>

                             

						<tr> 
                            <tr>
                                <tr><td><td><label for="">Select New Category: </label></td></td></tr>
                                <td>
                                    <td>
                                
                                <select id="select" name="Category" aria-placeholder="TEXT">
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
                                </td>
                            </tr>

                            <tr> 
                                 <td></td>  

                                <td >
                                  <input type="submit" name="submit" Value="Update" class="btn btn-green"/>
                                </td>
                            </tr>

                            <td></td>
                            
                             <td style="width: 100px;">
                                <a href="articlelist.php" class="btn btn-red">CANCEL</a>
                            </td>
                           
                        </tr>
                     


                    </table>
                    </form>
                    <?php }  ?> <!-- closing the if statment with php tag -->

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

<?php include 'inc/footer.php';?>