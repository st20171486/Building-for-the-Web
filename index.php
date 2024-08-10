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
        <script>
            // validate login form
            function validateLoginForm(){
                var Username = document.forms["login"]["Username"].value;
                var Password = document.forms["login"]["Password"].value;

                if (Username === "" || Password === "") {
                    alert("Please fill in the Username and Password fields.")
                    return false;
                }
            }
        </script>
    
    </head>
    <body>
        <?php
            $username = $password = "";
            $usernameError = $passwordError = $dbConnectionError = $credentialError = "";
            $foundErrors = false;

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(empty($_POST["username"])) {
                    $usernameError = "Username is required";
                    $foundErrors = true;
                }
                else {
                    $username = clearUserInputs($_POST["username"]);
                }
                
                if(empty($_POST["password"])) {
                    $passwordError = "Password is required";
                    $foundErrors = true;
                }   
                else {
                    $password = clearUserInputs($_POST["password"]);
                }

                //$username = $_POST["username"];
                //$password = $_POST["password"];

                if($foundErrors == false) {
                    $servername = "localhost";
                    $dbusername = "root";
                    $dbpassword = "";
                    $databasename = "cardiffmetcarsales";

                    // Create connection
                    $conn = new mysqli($servername, $dbusername, $dbpassword, $databasename, 3306);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    //echo "Connected successfully \n";

                    //retrieve user inputs from db
                    $sql = "SELECT * FROM users WHERE username=? AND password=?";

                    $stmt = $conn->prepare($sql);
                    // bind params
                    $stmt->bind_param("ss", $username, $password,);
                    
                    //execute the sql
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if($result->num_rows === 0) {
                        echo "Invalid username or password";
                        $credentialError = "Invalid username or password";
                    }
                    else{
                        //echo "Rows: " . $result->num rows;
                        //get data
                        $row = $result->fetch_assoc();

                        //create ses vars and store user data in them
                        $SESSION["username"] = $row["username"];
                        $SESSION["userid"] = $row["userid"];

                        $stmt->close();
                        $conn->close();

                        //redirect user to user to home page once logged in
                        header('location: home.php');
                    }
                }
            
            }
            //clear user inputs
            function clearUserInputs($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <div class="home">
            <div>
                <img src="images/carHome.jpg" width="700" height="450" alt="well" >
            </div>   
            
            <div class="text" >
                <div  style="font-size: 50px;";>Welcome</div>
                <div>
                    <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ;?>" 
                    method="POST" onsubmit="return validateLoginForm();">
                        <div class="login">
                            <div><label for="Username">Username:</label></div>
                            <div><input type="text" name="Username" placeholder="Enter Username"></div>
                            <div><label for="Password">Password:</label></div>
                            <div><input type="password" name="Password" placeholder="Enter Password"></div>
                        </div>
                        <div class="buttons">
                            <div><input style="width: 100%;"type="submit" name="" value="Login"></div>
                            <div><button onclick="location.href='register.php'" style="width: 100%;" type="button" name="Register">Register</button></div>
                        </div>
                    </form>
                </div>
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