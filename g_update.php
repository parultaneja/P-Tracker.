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
if ($_GET['id'] && $_GET['aqi']){
	$id=$_GET['id'];
	$aqi=$_GET['aqi'];


		$sql ="INSERT INTO `aqi` ( `timestamp`, `Id`, `aqi`) VALUES (CONVERT_TZ(CURRENT_TIMESTAMP(),'+00:00','+00:00'), $id, $aqi)";	  

		if ($conn->query($sql) === TRUE) {
		echo '1';
		}
			else{
				echo '0';
			}


	$conn->close();
}

?>