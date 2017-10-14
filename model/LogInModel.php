<?php
require_once ('../dbConnect.php');

class LogInModel{
    public $databaseConnection;
    
    public function __construct(){
        $this->databaseConnection = new DatabaseConnection();
        $this->databaseConnection->tempConnection();
    }

    public function getlogin(){
        if(isset($_REQUEST['userName']) && isset($_REQUEST['password'])){

            $userName = $_REQUEST['userName'];
            $password = $_REQUEST['password'];
            
            $sql = "SELECT * FROM User WHERE userName = '$userName' AND password = '$password'";
            $result = mysqli_query($this->databaseConnection->conn1, $sql);

            if(mysqli_num_rows($result) >= 1) {
                return 'login';
             }else {
                return 'invalid user';
             }
        }
    }
}


?>