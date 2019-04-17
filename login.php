<?php

$servername = "localhost";
$username = "id9194595_ptracker";
$password = "Dee@1999";
$dbname = "id9194595_ptracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($_GET['username'] && $_GET['password'])
{
        $username=$_GET['username'];
        $password=$_GET['password'];
		$sql ="SELECT * from login where username='$username' and password='$password'";
        if( $conn->query($sql)){
        $result=$conn->query($sql);
        if ($result->num_rows > 0) 
        {
            echo 1;
                
            
        }


        else{
            echo 0;
        }
    

    
    
    }
    else{
            echo 0;
        }

	$conn->close();

}
?>
