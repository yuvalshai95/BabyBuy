<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/User.php'; ?>


<?php
    $user = new User();
    $getSocial = $user->getSocial()->fetch_assoc();
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block"> 

    <?php
        // Error handling
        if(isset($_GET['error'])){

            // empty field
            if ($_GET['error']=='empty') {
                echo "<span  class='alert alert-danger' role='alert' style='padding: .3rem 1rem;'>Cant have empty fields !</span>";
            }
            else if ($_GET['error']=='stmtfailed') {
                echo "<span  class='alert alert-danger' role='alert' style='padding: .3rem 1rem;'>Error occurred, try again!</span>";
            }
        }
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'success') {
                echo "<span  class='alert alert-success' role='alert' style='padding: .3rem 1rem;'>Update successfully!</span>";
            }
        }
?>            

         <form action="inc/social.inc.php" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" placeholder="<?= $getSocial['facebook']?>" value="<?= $getSocial['facebook']?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Instagram</label>
                    </td>
                    <td>
                        <input type="text" name="instagram" placeholder="<?= $getSocial['instagram']?>" value="<?= $getSocial['instagram']?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="linkedin" placeholder="<?= $getSocial['linkedin']?>" value="<?= $getSocial['linkedin']?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>