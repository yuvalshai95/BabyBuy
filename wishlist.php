<?php require_once 'includes/navTop.php';  
      require_once 'classes/Product.php';
      require_once 'classes/User.php';
?>

<?php
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





<table>

    <th>Product Name</th>
    <th>Unit Price</th>
    <th>Status</th>
    <th>Seller Details</th>
    <th>Product Page</th>
    <th>Remove</th>
    <?php
    $currentUser = Session::get("userId");
    if(isset($_POST['currentUserId']) ){
       $wishPd          = $_POST['pdId'];
       $wishOwnerid     = $_POST['ownerId'];
       $currentUserId   = $_POST['currentUserId'];

      echo 'wishPd: '.$wishPd."<br>";
      echo 'wishOwnerid: '.$wishOwnerid."<br>";
      echo 'currentUserId: '.$currentUserId."<br>";

       $pd->InsertToWishlist($wishPd, $wishOwnerid , $currentUserId);

       $allWishlist = $pd->getAllWishlist($currentUser);

       if($allWishlist !== false){
           while($row = $allWishlist -> fetch_assoc()){

            $product    = $pd->getProductByIdAndUser($row['ProductID'],$row['UserID'])->fetch_assoc();
            $owner      = $user->getUserById($row['UserID'])->fetch_assoc();

    
?>

    <tr>
        <td><?php echo $product['ProductName'] ?></td>
        <td><?php echo $product['Price'] ?></td>
        <td><?php echo $product['Status'] ?></td>
        <td><button>Details</button></td>
        <td><button><a href="ProductPage.php?pdId=<?php echo $product['ProductID']?>&userId=<?php echo $wishOwnerid ?>&productCategory=<?php echo "1" ?>">Visit</a></button></td>
        <td><button>Remove</button></td>
    </tr>
    <?php }}?>

</table>

<?php } else{ ?>

    <h1>My wishlist</h1>

<table>
    <th>Product Name</th>
    <th>Unit Price</th>
    <th>Status</th>
    <th>Seller Details</th>
    <th>Product Page</th>
    <th>Remove</th>


</table>
<h2>Your wishlist is empty</h2>
<?php } ?>

<?php require_once 'includes/footer.php';  ?>