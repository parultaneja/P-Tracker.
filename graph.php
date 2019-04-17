<?php

if($_GET['id']){
    $id=$_GET['id'];
    $servername = "localhost";
    $username = "id9194595_ptracker";
    $password = "Dee@1999";
    $dbname = "id9194595_ptracker";
    
    // Create connection
    $connect = new mysqli($servername, $username, $password, $dbname);
    
    $query = 'SELECT UNIX_TIMESTAMP(timestamp) AS datetime,aqi FROM aqi WHERE Id= "'.$id.'" ORDER BY datetime ASC, id DESC LIMIT 25';
    $result = mysqli_query($connect, $query);
        $rows = array();
        $table = array();
        
        $table['cols'] = array(
         array(
          'label' => 'Date Time', 
          'type' => 'datetime'
         ),
         array(
          'label' => 'AQI (PM 2.5)', 
          'type' => 'number'
         )
        );
        
        while($row = mysqli_fetch_array($result))
        {
         $sub_array = array();
         $datetime = explode(".", $row["datetime"]);
         $sub_array[] =  array(
              "v" => 'Date(' . $datetime[0] . '000)'
             );
         $sub_array[] =  array(
              "v" => $row["aqi"]
             );
         $rows[] =  array(
             "c" => $sub_array
            );
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);

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
  <link rel="stylesheet" type="text/css" href="css/banner.css">
<!--===============================================================================================-->  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable;?> );

    var options = {
     title:'AQI',
     legend:{position:'bottom'},
     chartArea:{width:'60%', height:'45%'},
     series: {
            0: { color: '#E3A23E' }
         
     }
        
    };

    var chart = new google.visualization.AreaChart(document.getElementById('line_chart'));

    chart.draw(data, options);
   }
  </script>
  
    
    
    
    
   
</head>
<body>
	<nav id="main-menu">
    
    <ul>     
        <li>
          <a href="index.php">Home</a>
        </li>
        
         <li>
         <a href="analysis.php">Data Analysis</a>
        </li>
        <li>
          <a href="data.csv">CSV</a>
        </li>
        
         <li>
         <a href="predict.php?id=P01">Predictions</a>
        </li>
        

      </ul>

    </nav>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
				<br />
  <span class="login100-form-title p-t-20 p-b-45">
						<br>AQI of the Area 
					</span>
					<div>
   <div id="line_chart" style="width: 65%; height: 500px"></div>
 	<div ></div>
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