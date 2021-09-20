<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Article.php'; ?>
<?php include_once 'helpers/Format.php'; ?>

<?php
$article = new Article();
$format  = new Foramt();
?>


<!-- Box icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <th>Edit</th>
                    <th>Remove</th>

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

				<tr class="odd gradeX" id="tr_<?php echo $result['ArticleID']; ?>">
				
					<td class="tableCenter"> <?= $i; ?> </td>
					<td class="tableCenter"><?= $result['ArticleHeader']; ?> </td>
					<td class="tableCenter"><?= $result['ArticleCategory']; ?> </td>
					<td class="tableCenter"><?= $format->textShorten($result['ArticleBody'], 20); ?> </td>
					<td class="tableCenter"><?= $result['ArticleTimeStamp']; ?> </td>
					<td class="tableCenter"> <img style="width: 60px;" src="<?= $result['ImagePath']; ?>" height="40px;" width="60px;"> </td>
                   
					
					<!-- TODO: make Reminder work -->
					<td class="tableCenter"> 
						<a href="articleedit.php?articleId=<?php echo $result['ArticleID']; ?> "><i class='bx bx-edit' style="font-size: 32px;color:gray;"></i></a>
					</td>

					<td>
						<div class="delete">
							<button type="button" onclick="delete_data('<?php echo $result['ArticleID']?>')"><i class='bx bx-x-circle'></i></button>
						</div>
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



<!-- jQuery Script to delete item from wishlist table -->
<script>
function delete_data(id){
	// using sweet alert to popup an alert asking user if he is sure he want to delete
	Swal.fire({
	title: 'Are you sure?',
	text: "You won't be able to revert this!",
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#253b70',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		// User clicked yes, he wants to delete
		if (result.isConfirmed) {
			jQuery.ajax({
						url: 'inc/removeArticle.inc.php',
						type:'post',
						data: {id:id},
						success: function(result){
							// on success hide row
							jQuery("#tr_"+id).hide(600);
					}
				})
		}
	});
}
</script>
 <!-- jQuery Script to delete item from wishlist table -->



<style>
	.delete button {
    background: none;
    border: none;
    cursor: pointer;
    color: gray;
    font-size: 32px;
}
.edit button {
    background: none;
    border: none;
    cursor: pointer;
    color: gray;
    font-size: 32px;
}
</style>
<?php include 'inc/footer.php';?>
