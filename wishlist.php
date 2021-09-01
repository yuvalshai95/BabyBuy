<?php require_once 'includes/navTop.php';  
      require_once 'classes/Product.php';
      require_once 'classes/User.php';
?>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->  

<?php
    $currentUser = Session::get("userId");
    $pd = new Product();
    $user = new User();
?>

<style>
    table tr td{
        color: gray;
    }

    table th{
        color: black;
    }
    table{
    margin: auto;
    }
    h1,h2{
        text-align: center;
    }
</style>

<!-- Add to wish list product user clicked on -->
<?php
    if (isset($_POST['currentUserId'])) {
        $wishPd     = $_POST['pdId'];
       $wishOwnerid = $_POST['ownerId'];
       $pd->InsertToWishlist($wishPd, $wishOwnerid , $currentUser);
    }
?>

<!-- wishlist table -->
<h1>My Wishlist</h1>
<table>

    <th>Product Name</th>
    <th>Unit Price</th>
    <th>Status</th>
    <th>Seller Details</th>
    <th>Product Page</th>
    <th>Remove</th>

    <!-- Get all wishlist items by user ID from session-->
    <?php

    $getAllWishlist = $pd->getAllWishlist($currentUser);
    if ($getAllWishlist !== false) {
        while($row = $getAllWishlist->fetch_assoc()){
            $product = $pd->getProductByIdAndUser($row['ProductID'],$row['UserID'])->fetch_assoc();
    ?>
    <tr id="tr_<?php echo $row['ID'] ?>">
        <td>
            <img src="admin/<?php echo $product['Image']?>" alt="" height="70px;" width="70px;">
            <?php echo $product['ProductName'] ?>
        </td>
        <td><?php echo $product['Price'] ?></td>
        <td><?php echo $product['Status'] ?></td>
        <td><button type="button" class="btn btn-info btn-xs view_data" name="view" class="view_data" id="<?php echo $row['UserID']; ?>">Details</button></td>
        <td><button><a href="ProductPage.php?pdId=<?php echo $row['ProductID']?>&userId=<?php echo $row['UserID']?>&productCategory=<?php echo $product['ProductCategory']?>">Go to page</a></button></td>
        <td>
            <button type="button" onclick="delete_data('<?php echo $row['ID']?>')">Delete</button>
        </td>
       
    </tr>
    <?php }} ?>
</table>

    <!-- jQuery Script to delete item from wishlist table -->
    <script>
    function delete_data(id){
        jQuery.ajax({
            url: 'includes/wishlist.inc.php',
            type:'post',
            data: 'id='+id,
            success: function(result){
                // on success hide row
                jQuery("#tr_"+id).hide(600);
            }
        });
    }
</script>
 <!-- jQuery Script to delete item from wishlist table -->


<!-- User Details after button click bootstrap modal -->
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <button type="button" name="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">User Details</h4>
            </div>

            <!-- Body, get body content from ajax function call -->
            <div class="modal-body" id="user_detail">
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- User Details after button click bootstrap modal -->


<!-- Script to show user details modal on click -->
<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var user_id = $(this).attr("id"); // id from details button 

            $.ajax({
                url:"includes/userdata.inc.php",
                method:"post",
                data:{user_id:user_id},
                success: function(data){ 
                    // data we get back from the sever we want to show it in class=modal-body, id=user_detail
                    $('#user_detail').html(data);

                    //div id=datamodal selector -> on success show modal
                    $('#dataModal').modal("show");
                }
            });


        });
    });
</script>
<!-- Script to show user details modal on click -->






<?php require_once 'includes/footer.php';  ?>