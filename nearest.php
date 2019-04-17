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

if($_GET['lat'] && $_GET['lng'])
{
		$lat=$_GET['lat'];
		$lng=$_GET['lng'];
		
		$lat=substr(trim($lat), 0, -2);
		$lng=substr(trim($lng), 0, -2);
		
		$sql ="SELECT aqi,tracker.id FROM aqi,tracker WHERE tracker.lat like '$lat%' and tracker.lng like '$lng%' and tracker.id=aqi.id ORDER BY aqi.id DESC LIMIT 1";
        if( $conn->query($sql)){
        $result=$conn->query($sql);
        if ($result->num_rows > 0) 
        {
	        $row = $result->fetch_assoc();
            echo $row["aqi"].','.$row["id"];
                
            
        }


        else{
            echo "no tracker";
        }
    

    
    
    }
    else{
            echo "no tracker";
        }

	$conn->close();

}
?>
