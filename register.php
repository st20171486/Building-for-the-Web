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
    </head>    
    <body>
        <script>
            //validate the entire form
            function validate(form){
                var fail = "";

                var firstname = form.firstname.value;
                fail = validateFirstname(firstname);

                var surname = form.surname.value;
                fail += validateSurname(surname);

                var username = form.username.value;
                fail += validateUsername(username);

                var password = form.password.value;
                fail += validatePassword(password);

                var gender = form.gender.value;
                fail += validateGender(gender);

                var address = form.address.value;
                fail += validateAddress(address);

               var postcode = form.postcode.value;
                fail += validatePostcode(postcode);

                var email = form.email.value;
                fail += validateEmail(email);

                var phone_number = form.phone_number.value;
                fail += validatePhone_number(phone_number);

                if (fail == "") {
                    return true;
                }
                else{
                    alert(fail);
                    return false;
                }
            }

            //validate firstname
            function validateFirstname(field){
                return (field == "") ? "Firstname is missing.\n" : "";
            }
            //validate surname
            function validateSurname(field){
                return (field == "") ? "Surname is missing.\n" : "";
            }
            //validate username
            function validateUsername(field){
                if (field == "") {
                    return "Username is missing.\n";
                }
                //prevent spaces as input
                else if (field.length < 5) {
                    return "Username must be at least 5 characters.\n";
                }
                return "";
            }
            //validate password
            function validatePassword(field){
                if (field == "") {
                    return "Password is missing.\n";
                }
                //prevent spaces as input
                else if (field.length < 8) {
                    return "Password must be at least 8 characters.\n";
                }
                //allow special characters
                /*else if (/[^a-zA-Z0-9_-]/.test(field)) {
                    return "Only a-z, A-Z, 0-9, - & _ are allowed.\n";
                }
                else if (!(/[a-z]/.test(field) )
                            || !(/[A-Z]/.test(field) )
                            || !(/[0-9]/.test(field)))
                    return "Passwords require one each of " + 
                    " a-z, A-Z and 0-9.\n";*/
                return "";
            }
            //validate gender
            function validateGender(field){
                return (field == "") ? "Gender hasn't been set.\n" : "";
            }
            //validate address
            function validateAddress(field){
                return (field == "") ? "Address is missing.\n" : "";
            }
            //validate postcode
            function validatePostcode(field){
                return (field == "") ? "Postcode is missing.\n" : "";
            }
            //validate email
            function validateEmail(field){
                if (field == "") {
                    return "Email is missing.\n";
                }
                else if ((/[^a-zA-Z0-9.@_-]/.test(field))) { //!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || 
                    return "Invalid email address.\n";
                }
                return "";
            }   
            //validate phone Number
            function validatePhone_number(field){
                return (field == "") ? "phone_number is missing.\n" : "";
            }
        </script>

        <?php
            //code to handle the form data

            //declare empty variables
            $firstname = $surname = $username = $password = $gender = $address = $postcode = 
            $email = $phone_number = "";

            // declare variables to hold error messages for each field. 
            $firstnameError = $surnameError = $usernameError = $passwordError = $genderError = 
            $addressError = $postcodeError = $emailError = $phone_numberError = "";
            $foundErrors = false;

            

            // condition to process the above if the user clicks on register
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(empty($_POST["firstname"])){
                    $forenameError = "Firstname is required";
                    $foundErrors = true;
                }
                else{
                    if(!preg_match("/^[a-zA-Z ]*$/",$_POST["firstname"])) {
                        $firstnameError = "Only letters and white space allowed";
                        $foundErrors = true;
                    }
                    else{
                        $firstname = clearUserInputs($_POST["firstname"]);
                    }
                }
                
                if(empty($_POST["surname"])) {
                    $surnameError = "Surname is required";
                    $foundErrors = true;
                }
                else {
                    $surname = clearUserInputs($_POST["surname"]);
                }
    
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
                
                
                if(empty($_POST["gender"])){ 
                    $genderError = "Gender must be selected";
                    $foundErrors = true;
                }
                else {
                    $gender = clearUserInputs($_POST["gender"]);
                }

                if(empty($_POST["address"])){
                    $addressError = "Address is required.";
                    $foundErrors = true;
                }
                else{
                    $address = clearUserInputs($_POST["address"]);
                }

                if(empty($_POST["postcode"])){
                    $postcodeError = "Postcode is required.";
                    $foundErrors = true;
                }
                else{
                    $postcode = clearUserInputs($_POST["postcode"]);
                }
    
                if(empty($_POST["email"])) {
                    $emailError = "Email is required";
                    $foundErrors = true;
                }
                else {

                
                    // validate email address
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $email = clearUserInputs($_POST["email"]);
                    }
                    else {
                        $emailError = "Invalid email address";
                        $foundErrors = true;
                    }
                }

                if(empty($_POST["phone_number"])){
                    $phone_numberError = "Phone number is required.";
                    $foundErrors = true;
                }
                else{
                    $phone_number = clearUserInputs($_POST["phone_number"]);
                }
            }



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

                // prepare SQL statements to insert data
                $sql = "INSERT INTO users 
                (firstname, 
                surname, 
                username, 
                password, 
                gender,
                address,
                postcode, 
                email,
                phone_number 
                )
                values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
                $stmt = $conn->prepare($sql);
                // bind params
                $stmt->bind_param("sssssssss", $firstname, $surname, $username, $password, $gender, $address, $postcode, $email, $phone_number);
                
                //execute the sql
                $stmt->execute();
                
                $res = $conn->affected_rows;
                
                if($res > 0){                    
                    $last_id = $conn->insert_id;
                    //echo "New record created successfully. Last inserted ID is: " . $last_id;
                }
                else
                    //echo "Error occurred while inserting record " . $res . " Error: ". $conn -> error. " \n";

                $stmt->close();
                $conn->close();

            }

            function clearUserInputs($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        
        ?>


        <div class="table">
            <table id="reg" cellpadding="10" cellspacing="5">
                <tbody><tr><th colspan="2" align="center">REGISTRATION FORM</th>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ;?>"  onsubmit="return validate(this);">
                    <tr>
                        <td>Firstname:</td>
                        <td><input type="text" maxlength="32" name="firstname" value="<?php echo $firstname; ?>"></td>
                        <td><span class="error"> * <?php echo $firstnameError; ?> </span></td>
                    </tr>
                    <tr>
                        <td>Surname:</td>
                        <td><input type="text" maxlength="32" name="surname" value="<?php echo $surname; ?>"></td>
                        <td><span class="error"> * <?php echo $surnameError; ?> </span></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" maxlength="16" name="username" value="<?php echo $username; ?>"></td>
                        <td><span class="error"> * <?php echo $usernameError; ?> </span></td> 
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" maxlength="12" name="password"></td>
                        <td><span class="error"> * <?php echo $passwordError; ?> </span></td> 
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender"
                            value="female"
                            <?php if(isset($gender) && $gender=="female") echo "checked"; ?>>Female

                            <input type="radio" name="gender"
                            value="male"
                            <?php if(isset($gender) && $gender=="male") echo "checked"; ?>>Male
                        
                        </td>
                        <td><span class="error"> * <?php echo $genderError ?> </span></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td>
                            <input type="text" name="address" value="<?php echo $address; ?>"/>
                            <td><span class="error"> * <?php echo $addressError ?> </span></td>
                        </td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td>
                            <input type="text" name="postcode" value="<?php echo $postcode; ?>"/>
                            <td><span class="error"> * <?php echo $postcodeError ?> </span></td>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" maxlength="64" name="email" value="<?php echo $email; ?>" ></td>
                        <td><span class="error"> * <?php echo $emailError ?> </span></td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td>
                            <input type="number" maxlength="12" name="phone_number" value="<?php echo $phone_number; ?>"/>
                            <td><span class="error"> * <?php echo $phone_numberError ?> </span></td>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Register" />
                        </td>
                    </tr>
                </form> 
            </table><hr>

        </div>
          
        <h2> Your inputs </h2>
        <table border="0" cellpadding="2" cellspacing="5" bgcolor="#f1f1f1">
            <tr>
                <td> Firstname entered: </td>
                <td> <?php echo $firstname ?> </td>
            </tr>
            <tr>
                <td> Surname entered: </td>
                <td> <?php echo $surname ?> </td>
            </tr>
            <tr>
                <td> Username entered: </td>
                <td> <?php echo $username ?> </td>
            </tr>
            <tr>
                <td> Password entered: </td>
                <td> <?php echo $password ?> </td>
            </tr>
            
            <tr>
                <td> Gender selected: </td>
                <td> <?php echo $gender ?> </td>
            </tr>
            <tr>
                <td> Address entered: </td>
                <td> <?php echo $address ?> </td>
            </tr>
            <tr>
                <td> Postcode entered: </td>
                <td> <?php echo $postcode ?> </td>
            </tr>

            <tr>
                <td> Email entered: </td>
                <td> <?php echo $email ?> </td>
            </tr>
            <tr>
                <td> Phone number entered: </td>
                <td> <?php echo $phone_number ?> </td>
            </tr>

        </table>
        
    </body>
</html>