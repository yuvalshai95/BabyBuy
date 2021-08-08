<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Article.php'; ?>
<?php include_once 'helpers/Format.php'; ?>

<?php
$article = new Article();
$format  = new Foramt();
?>

<?php 
	// We have a *Delete button so we have to check using the GET Method if it was clicked
	if ((isset($_GET['articleId']) && (isset($_GET['articleName'])))) {
		$idToDelete = $_GET['articleId'];
		$articleName = $_GET['articleName'];
		$deleteArticle = $article->deleteArticleById($idToDelete,$articleName);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Articles List</h2>

		<?php 
			if(isset($deleteArticle)){
				echo $deleteArticle;
			}
		?>

        <div class="block">  
            <table class="data display datatable" id="example">

			<!-- Table Titles -->
			<thead>
			
				<tr>
					<th>Serial No.</th>
					<th>Article Name</th>
					<th>Article Category</th>
					<th>Article Body</th>
					<th>Article Date</th>
					<th>Image</th>
                    <th>Action</th>

				</tr>
				
			</thead>
			<!--/ Table Titles -->

			<tbody>
			

			<?php
				// Run Query
				$getArticle = $article->getAllArticles();

				if ($getArticle) {
					$i = 0;
					while($result = $getArticle->fetch_assoc()){
					$i++;	
			?>

				<tr class="odd gradeX">
				
					<td class="tableCenter"> <?= $i; ?> </td>
					<td class="tableCenter"><?= $result['ArticleHeader']; ?> </td>
					<td class="tableCenter"><?= $result['ArticleCategory']; ?> </td>
					<td class="tableCenter"><?= $format->textShorten($result['ArticleBody'], 20); ?> </td>
					<td class="tableCenter"><?= $result['ArticleTimeStamp']; ?> </td>
					<td class="tableCenter"> <img src="<?= $result['ImagePath']; ?>" height="40px;" width="60px;"> </td>
                   
					
					<!-- TODO: make Reminder work -->
					<td class="tableCenter"> 
						<a href="articleedit.php?articleId=<?php echo $result['ArticleID']; ?> ">Edit</a> || 
						<a onclick="return confirm('Are You Sure You Want To Delete This Article?')" href="?articleId=<?php echo $result['ArticleID']; ?>&articleName=<?php echo $result['ArticleHeader']; ?>"> Delete</a>
					</td>
                    
				</tr>

				<?php 	} } ?> <!-- Closing the if and while loop -->


			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
