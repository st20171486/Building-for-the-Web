<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CardiffMetCarSales</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="index.css">
        
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
        <!--Add button placement-->
        <div><div id="add"><button onclick="location.href='addCar.html'"  
            type="button" name="Add">Add</button></div></div>
        
        <!--If the user is logged in this page would look like this-->
        <!--<div class="list">
            <div><img src="images/car2.jpg" width="250" height="150" alt="car2"></div>
            <div>Name</div>
            <div><button type="button" name="View Description">View Description</button></div>
            <div><button type="button" name="Delete">Delete</button></div>
            <div><img src="images/car3.jpg" width="250" height="150" alt="car3"></div>
            <div>Name</div>
            <div><button type="button" name="View Description">View Description</button></div>
            <div><button type="button" name="Delete">Delete</button></div>
            <div><img src="images/car4.jpg" width="250" height="150" alt="car4"></div>
            <div>Name</div>
            <div><button type="button" name="View Description">View Description</button></div>
            <div><button type="button" name="Delete">Delete</button></div>
        </div>-->
    </body>
</html>