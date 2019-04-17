
<?php   



if(isset($_GET['location']))
{
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

		$loc=$_GET['location'];
		$sql ="SELECT id from locations where location like '%$loc%';";
        if($result= $conn->query($sql)){
        if ($result->num_rows > 0) 
        {
	        $row = $result->fetch_assoc();
	        $site='graph.php?id='.$row['id'];
	        echo '<script type="text/javascript">location.href = "'.$site. '"</script> ';
        }
        else{
             $rec="Soory no ptracker nearby";
           }
 
	$conn->close();

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>P-Tracker</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logo.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="logo.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						P-Tracker
					</span>
					<span class="login100-form-title p-t-20 p-b-45">
						Enter the location whose AQI you want to see.
					</span>
                    <div class="">
                        <?php   
                            if(isset($_GET['location']))
                            {echo $rec;}?>
                    </div>
					
					<div class="wrap-input100 validate-input m-b-10" data-validate = "location required">
					
				    	<input class="input100" type="text" name="location" placeholder="location">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Check
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>