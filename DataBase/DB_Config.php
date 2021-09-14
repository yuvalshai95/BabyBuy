

<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/utils.php'); 
?>




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

        // add "3308" port at the end if errors are showing
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
         $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
         if($insert_row){
             return $insert_row;
             exit();
         }else{
             return false;
         }
     }
     
     // Update data from database
     public function update($query){
         $update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
         if($update_row){
            return $update_row;
         }else{
            return false;
         }
     }

     // Delete data from database
     public function delete($query){
        $delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($delete_row){
          return $delete_row;
        }else{
           return false;
        }
    }
}
?>







