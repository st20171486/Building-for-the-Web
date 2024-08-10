<?php
session_start();
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
        
    <body>
        <?php
        $imageok = false;

        // extract selected file details:
        $file_name = $_FILES['profilepic']['name'];
        $file_size =$_FILES['profilepic']['size'];
        $file_tmp =$_FILES['profilepic']['tmp_name'];
        $file_type=$_FILES['profilepic']['type'];
        $basename_file = basename($_FILES["profilepic"]["name"]);
        $file_ext = strtolower(pathinfo($basename_file,PATHINFO_EXTENSION));

        echo "File name: " . $file_name . "<br>";
        echo "File size: " . $file_size . "<br>";
        echo "File tmp_name: " . $file_tmp . "<br>";
        echo "File type: " . $file_type . "<br>";
        echo "File basename: " . $basename_file . "<br>";
        echo "File extension: " . $file_ext . "<br><br><br>";

        $allowed_extensions= array("jpeg","jpg", "png");

        if ($file_size > 500000) {
            $profilePicError .=  "Sorry, your file is too large. <br>";
            $imageok = false;
        }
        else if(in_array($file_ext,$allowed_extensions)=== false) {
            $profilePicError .=  "Only JPEG, PNG and JPG files are allowed <br>";
            $imageok = false;
        }
        else {
            $imageok = true;
        }
        ?>
        <div class="upload">
            <div>
                <div><img src="" width="90" height="81" alt="please upload image"></div>
                <div>
                    <div><button  type="button" name="Camera">Camera</button></div>
                    <div><button   type="button" name="Upload File">Upload File</button></div>
                </div> 
            </div>
            <div class="details">
                <div><label for="Vehicle Make">Vehicle Make:</label></div>
                <div><input type="text" name="Vehicle Make"></div>
                <div><label for="Vehicle Model">Vehicle Model:</label></div>
                <div><input type="text" name="Vehicle Model"></div>
                <div><label for="Vehicle BodyType">Vehicle BodyType:</label></div>
                <div><input type="text" name="Vehicle BodyType"></div>
                <div><label for="Fuel Type">Fuel Type:</label></div>
                <div><input type="text" name="Fuel Type"></div>
                <div><label for="Mileage">Mileage:</label></div>
                <div><input type="number" name="Mileage"></div>
                <div><label for="Location">Location:</label></div>
                <div><input type="text" name="Location"></div>
                <div><label for="Year">Year:</label></div>
                <div><input type="number" name="Year"></div>
                <div><label for="Number of Doors">Number of Doors:</label></div>
                <div><input type="number" name="Number of Doors"></div>
                
            </div>
            <div><button   type="button" name="Add Vehicle">Add Vehicle</button></div>
        </div>


        <section class="row"> 
            <div class="col-12">
                
            </div>
        </section>










    </body>
</html>