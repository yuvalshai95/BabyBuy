<?php require_once 'includes/navTop.php';  
      require_once 'classes/Product.php';
      require_once 'classes/User.php';
?>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
        $wishPd          = $_POST['pdId'];
       $wishOwnerid     = $_POST['ownerId'];
       $pd->InsertToWishlist($wishPd, $wishOwnerid , $currentUser);
    }
?>




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
        <td><button>Details</button></td>
        <td><button><a href="ProductPage.php?pdId=<?php echo $row['ProductID']?>&userId=<?php echo $row['UserID']?>&productCategory=<?php echo $product['ProductCategory']?>">See Product</a></button></td>
        <td>
            <button type="button" onclick="delete_data('<?php echo $row['ID']?>')">Delete</button>
        </td>
       
    </tr>
    <?php }} ?>


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

    <?php /*
    $currentUser = Session::get("userId");
    if(isset($_POST['currentUserId'])){
       $wishPd          = $_POST['pdId'];
       $wishOwnerid     = $_POST['ownerId'];
       $currentUserId   = $_POST['currentUserId'];

    // TODO: Delete after use
     // echo 'wishPd: '.$wishPd."<br>";
     // echo 'wishOwnerid: '.$wishOwnerid."<br>";
    // echo 'currentUserId: '.$currentUserId."<br>";

       $pd->InsertToWishlist($wishPd, $wishOwnerid , $currentUserId);

       $allWishlist = $pd->getAllWishlist($currentUser);

       if($allWishlist !== false){
           while($row = $allWishlist -> fetch_assoc()){

            $product    = $pd->getProductByIdAndUser($row['ProductID'],$row['UserID'])->fetch_assoc();
            $owner      = $user->getUserById($row['UserID'])->fetch_assoc();

    
?>

    <tr>
        <td>
            <img src="admin/<?php echo $product['Image']?>" alt="" height="70px;" width="70px;">
            <?php echo $product['ProductName'] ?>
        </td>
        <td><?php echo $product['Price'] ?></td>
        <td><?php echo $product['Status'] ?></td>
        <td><button>Details</button></td>
        <td><button><a href="ProductPage.php?pdId=<?php echo $row['ProductID']?>&userId=<?php echo $row['UserID']?>&productCategory=<?php echo $product['ProductCategory']?>">See Product</a></button></td>
        <form action="" method="POST">
            <input type="hidden" name="wishId" value="<?php echo $row["ID"]?>">
        <td><button><a href="wishlist.php">Remove</a></button></td>
        </form>
        
    </tr>
    <?php }} */?>

</table>

<?php /* } else if($pd->getAllWishlist($currentUser) !== false){ ?>

    <?php 

       while($row = $pd->getAllWishlist($currentUser) -> fetch_assoc()){ 
        $wishPd = $row['ProductID'];
       // $owner = $row['UserID'];
        $product = $pd->getProductByIdAndUser($row['ProductID'],$row['UserID'])->fetch_assoc(); ?>

        <tr>
            <td>
                <img src="admin/<?php echo $product['Image']?>" alt="" height="70px;" width="70px;">
                <?php echo $product['ProductName'] ?>
            </td>
            <td><?php echo $product['Price'] ?></td>
            <td><?php echo $product['Status'] ?></td>
            <td><button>Details</button></td>
            <td><button><a href="ProductPage.php?pdId=<?php echo $row['ProductID']?>&userId=<?php echo $row['UserID']?>&productCategory=<?php echo $product['ProductCategory']?>">See Product</a></button></td>
            <form action="" method="POST">
                <input type="hidden" name="wishId" value="<?php echo $row["ID"]?>">
                <td>
                    <button><a href="wishlist.php">Remove</a></button>
                </td>
            </form>

        </tr>
    <?php }
}  */?>















<!--
    <h1>My wishlist</h1>

<table>
    <th>Product Name</th>
    <th>Unit Price</th>
    <th>Status</th>
    <th>Seller Details</th>
    <th>Product Page</th>
    <th>Remove</th>


</table>
<h2>Your wishlist is empty</h2> -->



<?php require_once 'includes/footer.php';  ?>