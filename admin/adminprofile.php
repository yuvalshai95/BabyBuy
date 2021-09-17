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

<!-- Box icon For nav icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

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
                                <a href="adminedit.php?adminId=<?php echo $_SESSION['AdminID']; ?>"> <i class='bx bx-edit' style="font-size: 30px;" ></i></a>
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
