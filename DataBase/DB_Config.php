
<!-- Method2 MySQLi Procedural Query-->

<?php require_once 'utils.php';?>

<?php
class Database
{
// Creating database variables using utils define globals 
    private $host        = host; 
    private $db_name     = db_name;
    private $username    = username;
    private $password    = password;
    public $conn;

    // Open db connection
    public function Open_DB_Connection(){

        $this->conn = null;
        try //Trying to connect the server using variables
		    {
                $this->conn =new mysqli($this->host, $this->username, $this->password, $this->db_name);

             } catch(Exception $e){ //Could not connect to the server
                echo "Connection error message: " . $e->getMessage(); //print error msg
             }
             
        return $this->conn; //opening the connection with the server
    }

    // Close db connection
    public function Close_DB_Connection(){
        $this->conn->close(); //close the conneection with the server
     }

     public function select($query){
         $result = $this->conn->query($query) or die ($this->conn->error.__LINE__);
         if($result->num_rows > 0){
             return $result;
         }else{
             return false;
         }
     }

     // Insert data to database
     public function insert($query){
         $insert_row = $this->conn->query($query) or die ($this->conn->error.__LINE__);
         if($insert_row){
             header("Location: ../BootStrap_MDB_Tamplate/home-page?msg=".urlencode('Data inserted Successfully'));
             exit();
         }else{
             die("Error: (".$this->conn->error.")".$this->conn->error);
         }
     }
     
     // Update data from database
     public function update($query){
         $update_row = $this->conn->query($query) or die ($this->conn->error.__LINE__);
         if($update_row){
            header("Location: ../BootStrap_MDB_Tamplate/home-page?msg=".urlencode('Data inserted Successfully'));
         }else{
            die("Error: (".$this->conn->error.")".$this->conn->error);
         }
     }

     // Delete data from database
     public function delete($query){
        $delete_row = $this->conn->query($query) or die ($this->conn->error.__LINE__);
        if($delete_row){
           header("Location: ../BootStrap_MDB_Tamplate/home-page?msg=".urlencode('Data inserted Successfully'));
        }else{
           die("Error: (".$this->conn->error.")".$this->conn->error);
        }
    }
}
?>



<!-- Method1 Connect MySQL Database with PHP Using PDO-->

<!--<?php
/*
class Database
{
    // Creating database variables
    private $host       = "localhost";
    private $db_name    = "db";
    private $username   = "root";
    private $password   = "";
    public $conn;

    public function Open_DB_Connection()
	{

	    $this->conn = null; //reseting the PDO connection to make sure there is no prev connection
        try //Trying to connect the server using variables
		    {
          $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                // set the PDO error mode to exception
    			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
		    catch(PDOException $exception) //Could not connect to the server
		    {
            echo "Connection error: " . $exception->getMessage(); //print error msg
        }

        return $this->conn;
    }

    public function Close_DB_Connection(){
        $this->$conn=null; //close the conneection with the server
     }
}

*/
?> -->

