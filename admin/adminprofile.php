<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    require_once '../DataBase/DB_Config.php'; 
    class Admin{

        private $db;
    
        // Constructor
        public	function __construct(){
           $this->db = new Database(); // when creating new db intsnace its opening a connection 
        }
    }
?>

<div class="grid_10">  

    <div class="box round first grid"> 
        <div class="block"> 
        <h2>Admin Profile</h2>

            <form action="">

            <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $_SESSION['AdminFirstName']; ?> <?= $_SESSION['AdminLastName']; ?></td>
                            <td><?= $_SESSION['AdminAddress']; ?> <?= $_SESSION['AdminCity']; ?></td>
                            <td><?= $_SESSION['AdminPhone']; ?></td>
                            <td><?= $_SESSION['AdminEmail']; ?></td>
                            <td>
                                <a href="adminedit.php?adminId=<?php echo $_SESSION['AdminID']; ?>" style="  width: 115px;height: 32px;line-height: 29px;font-size: 12px;background-color: #007bff; border-color: #007bff;padding: 10px;text-align: center;border-radius: 5px;color: white;font-weight: bold;line-height: 25px;"> Update</a>
                            </td>
                        </tr>
                     
                    </tbody>
                    </table>


            </form>

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
