
<!-- define var -->
<?php include_once 'utils.php'; ?> 

<!-- Method2 MySQLi OOP Query-->
<?php
class Database{

// Creating database variables using utils define globals 
    public $host    = DB_HOST; 
    public $user    = DB_USER;
    public $pass    = DB_PASS;
    public $dbname  = DB_NAME;

    public $link;
    public $error;


    // when new instance of database is made open the connection
    public function __construct(){
        $this->connectDB();  
    }

    // Open db connection method
    private function connectDB(){

        $this->link = new mysqli($this->host,$this->user, $this->pass, $this->dbname);

        if(!$this->link) {
            $this->error ="connection to database failed: ".$this->link->connect_error;
              return false;
           }
        }

     // Select or Read data from database   
     public function select($query){
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);

        if($result->num_rows > 0){
            return $result;
            } else {
                return false;
            }   
         }

     // Insert data to database
     public function insert($query){
         $insert_row = $this->conn->query($query) or die ($this->conn->error.__LINE__);
         if($insert_row){
             return $insert_row;
             exit();
         }else{
             return false;
         }
     }
     
     // Update data from database
     public function update($query){
         $update_row = $this->conn->query($query) or die ($this->conn->error.__LINE__);
         if($update_row){
            return $update_row;
         }else{
            return false;
         }
     }

     // Delete data from database
     public function delete($query){
        $delete_row = $this->conn->query($query) or die ($this->conn->error.__LINE__);
        if($delete_row){
          return $delete_row;
        }else{
           return false;
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

