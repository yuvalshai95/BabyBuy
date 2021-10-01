<?php
require_once '../DataBase/DB_Config.php';
require_once '../classes/Product.php';

$pd = new Product();

$id = $_POST['product_id'];
$currentUser_id = $_POST['currentUser_id'];

$getProduct = $pd->getProductByProductId($id);

$row = $getProduct->fetch_assoc();

?>

<form action="includes/editproduct.inc.php" method="POST" id="edit_form">  
                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control" value="<?= $row['ProductName']; ?>" />  
                          <br />  
                          <label>Description</label>  
                          <textarea name="description" id="description" class="form-control" rows="4" cols="50" ><?= $row['Description']; ?></textarea>  
                          <br /> 
                          <label>Price</label>  
                          <input type="text" name="price" id="price" class="form-control"  value="<?= $row['Price']; ?>" />  
                          <br />   
                          <label>Select PickUp</label>  
                          <select name="pickup" id="pickup" class="form-control">  
                               <option value="local"    <?php if($row["PickupOptions"]=="local"){ echo "selected";} ?>   >Local</option>  
                               <option value="shipping" <?php if($row["PickupOptions"]=="shipping"){ echo "selected";} ?> >Shipping</option>  
                          </select>  
                          <br />  

 
                         
                          <label>Select Age Group</label> 
                          <select name="age" id="age" class="form-control">  
                               <option value="3"  <?php if($row["Age"]==3){ echo "selected";} ?>  >0-3 months</option>  
                               <option value="12" <?php if($row["Age"]==12){ echo "selected";} ?> >0-12 months</option>  
                               <option value="36" <?php if($row["Age"]==36){ echo "selected";} ?> >12-36 months</option>  
                               <option value="40" <?php if($row["Age"]==40){ echo "selected";} ?> >36+ months</option>  
                          </select>    
                          <br />
                          <label>Select Condition</label>  
                          <select name="condition" id="condition" class="form-control">  
                               <option value="new"    <?php if($row["ProductCondition"]=="new"){ echo "selected";} ?>   >Brand New</option>  
                               <option value="open"   <?php if($row["ProductCondition"]=="open"){ echo "selected";} ?>  >Open Box</option>  
                               <option value="barley" <?php if($row["ProductCondition"]=="barley"){ echo "selected";} ?> >Barley Used</option>  
                               <option value="gently" <?php if($row["ProductCondition"]=="gently"){ echo "selected";} ?> >Gently Used</option>  
                          </select>    
                          <br />
                          <label>Select Status</label>  
                          <select name="status" id="status" class="form-control">  
                               <option value="Available" <?php if($row["Status"]=="Available"){ echo "selected";} ?> >Available</option>  
                               <option value="sold"      <?php if($row["Status"]=="sold"){ echo "selected";} ?> >Sold</option>  
                          </select>    
                          <br />    
                          <input type="submit" name="edit" id="edit" value="EDIT" class="btn btn-success" />  
                          <input type="hidden" name='currentUser_id' value="<?php echo $currentUser_id; ?>">
                          <input type="hidden" name='productId' value="<?php echo $id; ?>">
                     </form>  