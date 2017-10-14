<?php

class DatabaseConnection{

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "finalExamSection2";
    var $conn1 = "";

    function createConection()
    {
        
            // Create connection
            $conn = mysqli_connect($this->servername, $this->username, $this->password);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            mysqli_close($conn);
    }

    function createDataBase()
    {

        // Create database
            $conn = mysqli_connect($this->servername, $this->username, $this->password);

            $sql = "CREATE DATABASE finalExamSection2";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }

            mysqli_close($conn);
    }

    function createUserTable(){
        // sql to create table
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        $sql = "CREATE TABLE User (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            userName VARCHAR(50) NOT NULL,
            password VARCHAR(30) NOT NULL
            )";

        if (mysqli_query($conn, $sql)) {
            echo "Table User created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    function insertUserData()
	{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);
            

			//Comment Code After Inserting Record On Load
            
            $sql = "INSERT INTO User (userName,password)
            VALUES('admin','admin@123'),
            ('user','user@123'),
            ('ankur','ankur@123')";

			//Comment Code After Inserting Record On Load


				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
				}

		$conn->close();
    }

    function tempConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "finalExamSection2";
       
       $this->conn1 = mysqli_connect($servername,$username,$password,$dbname);
   }
}
?>