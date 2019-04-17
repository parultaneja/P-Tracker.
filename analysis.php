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
  <link rel="stylesheet" type="text/css" href="css/banner.css">
<!--===============================================================================================-->  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
<style>
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: center;
      width: 50%;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: 100%;
      height: auto;
    }

    div.desc {
      padding: 15px;
      text-align: center;
      position: center;
    }
    font{
        font-weight: bold;
    }
</style>
    
    
    
   
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
        <div class="container-login100" style="background-image: url('images/img-01.jpg'); background-repeat: repeat-y;" >
                <br>
                <br>
                <span class="login100-form-title p-t-20 p-b-45">
                         <br>Air Pollution in India.
                         <p>
                             <font color="black">
                                Air pollution in India is a serious issue with the major
                                sources being fuelwood and biomass burning, fuel
                                adulteration, vehicle emission and traffic congestion. In
                                autumn and winter months, large scale crop residue
                                burning in agriculture fields – a low cost alternative to
                                mechanical tilling – is a major source of smoke, smog and
                                particulate pollution. India has a low per capita emissions of
                                greenhouse gases but the country as a whole is the third
                                largest after China and the United States.A 2013 study on
                                non-smokers has found that Indians have 30% lower lung
                                function compared to Europeans.
                                The Air (Prevention and Control of Pollution) Act was
                                passed in 1981 to regulate air pollution and there have
                                been some measurable improvements. However, the 2016
                                Environmental Performance Index ranked India 141 out of
                                180 countries.

                            </font>
                         </p>
                         <p>
                             <font color="black">
                                Two days before Diwali, residents of Delhi and its
                                neighbouring cities woke up to dense smog this morning.
                                The capital's weather index showed a sharp decline in air
                                quality across the city. While the Air Quality Index in Delhi's
                                Anand Vihar showed a reading of 912, which means
                                'hazardous' pollution, other pollution indicators showed a
                                spike too. PM2.5, which is considered very harmful to
                                health, showed a reading of 644 or over 20 times the safe
                                limit prescribed by the WHO. PM10 pollutant showed a
                                reading of 785, which too is nearly 30 times the safe limit.
                                PM2.5 pollutant are tiny particles that can enter the lungs
                                and bloodstream and cause serious harm. Children, the
                                elderly and those with respiratory ailments like asthma
                                suffer the most from Delhi's hazardous smog. Smog kills
                                more than one million Indians every year and Delhi has the
                                worst air of any major city on the planet the World Health
                                Organization says.<br>
                                1. Air Quality Index<br>
                                2. Naive Forecast<br>
                                3. Sulphur Dioxide<br>
                                4. Nitrogen Dioxide<br>
                                5. RSPM<br>
                                6. SPM<br>
                                


                             </font>
                         </p>
                    </span>
             <span class="login100-form-title p-t-20 p-b-45">
                    <font size="3" color="black"><b> India Map</b></font> 
                    <p>
                        <font color="black">
                        Air quality index of the biggest cities in India.
                        </font>
                    </p>
            </span>
            <div class="gallery" align="center">
                    <img src="images/aimages/air-quality-index-of-the-biggest-cities-in-india-11-04-19.jpg" alt="Cinque Terre" > </div>
             
           
             <span class="login100-form-title p-t-20 p-b-45">
                         <br><font size="3" color="black"> Yearly AQI.
                            </font>
                </span>
            <div class="gallery" align="center">
                    <img src="images/aimages/aqi2.png" alt="Cinque Terre" > </div>


                    <div class="gallery" align="center">
                    <img src="images/aimages/observe.png" alt="Cinque Terre" > </div>


            <span class="login100-form-title p-t-20 p-b-45"><B>Naive Forecast.</B>
                         <br>
                         <font color="black" size="3">
                        Yearly variation of AQI in India.
                        </font>
            </span>
            <div class="gallery" align="center">
                    <img src="images/aimages/yearaqi.png" alt="Cinque Terre" > </div>
            
            <span class="login100-form-title p-t-20 p-b-45">
                         <br>Sulphur Dioxide.
                         <p>
                             <font color="black">
                                <b><br> What is sulfur dioxide?
                                <br> </b>
                                Sulfur dioxide is a gas. It is invisible and has a nasty, sharp
                                smell. It reacts easily with other substances to form harmful
                                compounds, such as sulfuric acid, sulfurous acid and
                                sulfate particles.
                                About 99% of the sulfur dioxide in air comes from human
                                sources. The main source of sulfur dioxide in the air is
                                industrial activity that processes materials that contain
                                sulfur, eg the generation of electricity from coal, oil or gas
                                that contains sulfur. Some mineral ores also contain sulfur,
                                and sulfur dioxide is released when they are processed. In
                                addition, industrial activities that burn fossil fuels containing
                                sulfur can be important sources of sulfur dioxide.
                                Sulfur dioxide is also present in motor vehicle emissions, as
                                the result of fuel combustion. In the past, motor vehicle
                                exhaust was an important, but not the main, source of
                                sulfur dioxide in air. However, this is no longer the case.

                            </font>
                         </p>
                         <p>
                             <font color="black">
                                <b><br>
                                    Top 20 States.
                                </b>
                                

                            </font>
                         </p>
                </span>
                 <div class="gallery" align="center">
                    <img src="images/aimages/so2bar.png" alt="Cinque Terre" > </div>
                 <div class="desc" align="center">
                    <p>
                        <font color="black">
                            So2 Levels are higher in the industrial areas: Large, stationary sources with relatively high emissions, such as electric power plants and refineries. 1.Nonpoint sources: Smaller stationary sources such as dry cleaners, gasoline service stations and residential wood burning. May also include diffuse stationary sources such as wildfires and agricultural tilling. 2.On-road vehicles: Vehicles operated on highways, streets and roads. 3.Non-road sources: Off-road vehicles and portable equipment powered by internal combustion engines. Includes lawn and garden equipment, recreational equipment, construction equipment, aircraft and locomotives.
                        </font>
                    </p>
                </div> 
                 <span class="login100-form-title p-t-20 p-b-45">
                         <br><font size="3" color="black"> Highest Value of SO2 in Chronological order.
                            </font>
                </span>
                <div class="gallery" align="center">
                    <img src="images/aimages/s02chron.png" alt="Cinque Terre" > </div>
               
                <span class="login100-form-title p-t-20 p-b-45">
                         <br><font size="3" color="black"> Mean Value graph of SO2.
                            </font>
                </span>
                 
                 <div class="gallery" align="center">
                    <img src="images/aimages/so2mean.png" alt="Cinque Terre" > </div>
                
                <span class="login100-form-title p-t-20 p-b-45">
                </span>
                <div class="desc" align="center">
                        
                            <font color="black">
                            The Mean Value of SO2 level in India is 10.
                            </font>
                        
                </div>
                <div class="desc" align="center"><b>Effects of SO2</b>
                    <p>
                        <font color="black">
                        Health effects of SO2 Short-term exposures to SO2 can
                        harm the human respiratory system and make breathing
                        difficult. Children, the elderly, and those who suffer from
                        asthma are particularly sensitive to effects of SO2.
                        Environmental effects of S02 SO2 emissions that lead to
                        high concentrations of SO2 in the air generally also lead to
                        the formation of other sulfur oxides (SOx). SOx can react
                        with other compounds in the atmosphere to form small
                        particles. These particles contribute to particulate matter
                        (PM) pollution: particles may penetrate deeply into sensitive
                        parts of the lungs and cause additional health problems.

                        </font>
                    </p>
            </div>

            <span class="login100-form-title p-t-20 p-b-45">
                         <br>Nitrogen Dioxide
                         <p>
                             <font color="black">
                                <b><br> What is nitrogen dioxide?
                                <br> </b>
                                Nitrogen Dioxide (NO2) is one of a group of highly reactive
                                gases known as oxides of nitrogen or nitrogen oxides
                                (NOx). Other nitrogen oxides include nitrous acid and nitric
                                acid. NO2 is used as the indicator for the larger group of
                                nitrogen oxides.
                                NO2 primarily gets in the air from the burning of fuel. NO2
                                forms from emissions from cars, trucks and buses, power
                                plants, and off-road equipment.


                            </font>
                         </p>
                         <p>
                             <font color="black">
                                <b><br>
                                    Top 20 States.
                                </b>
                                

                            </font>
                         </p>
                </span>
                 <div class="gallery" align="center">
                    <img src="images/aimages/no2bar.png" alt="Cinque Terre" > </div>
                 <div class="desc" align="center">
                    <p>
                        <font color="black">
                            In the presence of very high temperatures nitrogen and oxygen do react together to form nitric oxide. These conditions are found in the combustion of coal and oil at electric power plants, and also during the combustion of gasoline in automobiles. Both of these sources contribute about equally to the formation of nitrogen oxides.
                            In areas of high automobile traffic, such as in large cities, the amount of nitrogen oxides emitted into the atmosphere can be quite significant

                        </font>
                    </p>
                </div> 
                <div class="desc" align="center"><b>The highest value of So2 in chronological order</b>
                      
                </div>
                <span class="login100-form-title p-t-20 p-b-45">
                        
                    </span>  
                <div class="gallery" align="center">
                    <img src="images/aimages/no2chron.png" alt="Cinque Terre" > </div>

                 <span class="login100-form-title p-t-20 p-b-45">
                         <br><font size="3" color="black"> Mean Value graph of NO2.
                            </font>
                </span>
                 
                 <div class="gallery" align="center">
                    <img src="images/aimages/no2mean.png" alt="Cinque Terre" > </div>
                
                <span class="login100-form-title p-t-20 p-b-45">
                </span>
                <div class="desc" align="center">
                        
                            <font color="black">
                            The Mean Value of NO2 level in India is 25.
                            </font>
                        
                </div>
                <div class="desc" align="center"><b>Effects of NO2</b>
                    <p>
                        <font color="black">
                        Health effects Breathing air with a high
                        concentration of NO2 can irritate airways in the human
                        respiratory system. Such exposures over short periods can
                        aggravate respiratory diseases, particularly asthma, leading
                        to respiratory symptoms (such as coughing, wheezing or
                        difficulty breathing), hospital admissions and visits to
                        emergency rooms. Longer exposures to elevated
                        concentrations of NO2 may contribute to the development
                        of asthma and potentially increase susceptibility to
                        respiratory infections NO2 along with other NOx reacts with other chemicals in
                        the air to form both particulate matter and ozone. Both of
                        these are also harmful when inhaled due to effects on the
                        respiratory system.
                        Environmental effects NO2 and other NOx interact with
                        water, oxygen and other chemicals in the atmosphere to
                        form acid rain. Acid rain harms sensitive ecosystems such
                        as lakes and forests. Learn more about Acid Rain. The
                        nitrate particles that result from NOx make the air hazy and
                        difficult to see though. This affects the many national parks
                        that we visit for the view. Learn more about Visibility and
                        Haze. NOx in the atmosphere contributes to nutrient
                        pollution in coastal waters. Learn more about Nutrient
                        Pollution.


                        </font>
                    </p>
            </div>

             <span class="login100-form-title p-t-20 p-b-45">
                         <br> RSPM
                         <p>
                             <font color="black">
                                <b><br> What is RSPM?
                                <br> </b>
                                RSPM Respirable Suspended Particulate Matter.
                                Respirable suspended particulate matter or RSPM is a
                                causative agent of mortality and morbidity. Small particles
                                aggravate respiratory and cardiac symptoms in the short
                                term and trigger lung cancer in the long term. It is that
                                fraction of TSPM which is readily inhaled by humans
                                through their respiratory system and in general, considered
                                as particulate matter with their diameter (aerodynamic) less
                                than 2.5 micrometers. Larger particles would be filtered in
                                the nasal duct.

                            </font>
                         </p>
                         <p>
                             <font color="black">
                                <b><br>
                                    Top 20 States.
                                </b>
                                

                            </font>
                         </p>
                </span>
                 <div class="gallery" align="center">
                    <img src="images/aimages/rspmbar.png" alt="Cinque Terre" > </div>
                
                     <span class="login100-form-title p-t-20 p-b-45">
                         <br> SPM
                         <p>
                             <font color="black">
                                <b><br> What is SPM?
                                <br> </b>
                                SPM Suspended Particulate Matter.
                                Suspended particulate matter. Small particles
                                aggravate respiratory and cardiac symptoms in the short
                                term and trigger lung cancer in the long term. It is that
                                fraction of TSPM which is readily inhaled by humans
                                through their respiratory system and in general, considered
                                as particulate matter with their diameter (aerodynamic) less
                                than 2.5 micrometers. Larger particles would be filtered in
                                the nasal duct.

                            </font>
                         </p>
                         <p>
                             <font color="black">
                                <b><br>
                                    Top 20 States.
                                </b>
                                

                            </font>
                         </p>
                </span>
                 <div class="gallery" align="center">
                    <img src="images/aimages/spmbar.png" alt="Cinque Terre" > </div>

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