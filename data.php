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
		$sql ="Select CONVERT_TZ(timestamp,'+00:00','+05:30') as timestamp,aqi from aqi where id='P01'";	  
        $result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	$arr = [];
            $inc = 0;
            while ($row = $result->fetch_assoc()) {
                $jsonArrayObject = (array('timestamp' => $row["timestamp"], 'aqi' => $row["aqi"]));
                $arr[$inc] = $jsonArrayObject;
                $inc++;
            }
            $json_array = json_encode($arr);
            echo $json_array;
        }
        else{
            echo "0 results";
        }
	$conn->close();


?>
