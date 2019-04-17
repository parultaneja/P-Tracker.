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
if ($_GET['day'] && $_GET['aqi']&& $_GET['id'] && $_GET['time']){
	$day=$_GET['day'];
	$aqi=$_GET['aqi'];
	$id=$_GET['id'];
	$time=$_GET['time'];
		$sql ="INSERT INTO `predict` ( aqi, Id, day, time) VALUES ($aqi,'$id','$day', '$time')";
        
		if ($conn->query($sql) === TRUE) {
		echo '1';
		}
			else{
				echo '0';
			}

	  	}
	  	 else {
	    echo "0";
	}

	$conn->close();


?>