<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center> 
    <?php
        function uniqidReal($lenght = 38) {
            // uniqid gives 13 chars, but you could adjust it to your needs.
            if (function_exists("random_bytes")) {
                $bytes = random_bytes(ceil($lenght / 2));
            } elseif (function_exists("openssl_random_pseudo_bytes")) {
                $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
            } else {
                throw new Exception("no cryptographically secure random function available");
            }
            return substr(bin2hex($bytes), 0, $lenght);
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cml";
          
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST["first_name"];
        $last_name = $_REQUEST["last_name"];
        $email =  $_REQUEST["email"];
        $summary = $_REQUEST["summary"];
        $advice = $_REQUEST["advice"];
        $legalarea = $_REQUEST["specializations"];
        
          
        // Performing insert query execution
        // here our table name is college
        $uuid = uniqidReal();
        $sql = "INSERT INTO caseentry VALUES ('$uuid', '$summary','$advice','$email')";
        
        
        if(mysqli_query($conn, $sql)){
            for ($x = 0; $x < sizeof($legalarea); $x++) {
                $sql1 = "INSERT INTO case_legal_areas VALUES ('$uuid', '$legalarea[$x]')";
                mysqli_query($conn, $sql1);
            }
            
            echo "<h3>Your Case Note has been submitted to the portal successfully.\n"
            . "Your unique token ID is:\n";

            echo nl2br("\n$uuid\n");
            echo "Please keep your token ID for use on the portal and do not share it with anyone.";

        } else{
            echo "ERROR: Hush! Sorry $sql." 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);

    ?>

    <form method="post">
    
    <button type="submit" formmethod="post" formaction = 
    "<?php 
    $prefix = "https://formsubmit.co/";
    $actionable = $prefix . $email;
    echo $actionable; 
    ?>"

    value="Submit">Send a copy of the ID to my email</button>
    </form>
    </center>
</body>
  
</html>