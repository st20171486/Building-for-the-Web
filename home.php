<?php
session_start();
require "connectionstring.php"
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CardiffMetCarSales</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="index.css">
        
        <!-- design the webpage header --> 
        <header class="top">
            <div>
                <img src="images/icon.jpg" width="90" height="81" alt="icon">
            </div>

            <div>
                <h1>CardiffMetCarSales</h1>
            <a class="active" href="index.php">Home</a> 
            <a href="myCars.php">My Cars</a>
            <a href="aboutUs.php">About Us</a>
            </div>
        </header>
    </head>
    <body>
        <div class="home">
            <div>
                <img src="images/carHome.jpg" width="700" height="450" alt="well" >
            </div>   
            
            <div class="text" >
                <div  style="font-size: 50px;";>Welcome . <?php $firstname?></div>
            </div>     
        </div> 
        
        <h2>Latest Arrivals</h2>
        <hr>
        
        <div class="nested">
            <div><img src="images/car1.jpg" width="280" height="170" alt="car1">
                <label for="images/car1.jpg">Volvo</label>
            </div>
            <div><img src="images/car2.jpg" width="280" height="170" alt="car1">
                <label for="images/car2.jpg">Malta Auto</label>
            </div>
            <div><img src="images/car3.jpg" width="280" height="170" alt="car1">
                <label for="images/car3.jpg">Lambourgini</label>
            </div>
            <div><img src="images/car4.jpg" width="280" height="170" alt="car1">
                <label for="images/car4.jpg">Toyota</label>
            </div>
                
        </div>
    </body>
</html>