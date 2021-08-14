<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
    <style>
      body {
        background: #CCDDE2;
        font-family: 'Open Sans', sans-serif;
        }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 42px;
      font-size: 42px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      /* form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 25px 0 #d6e0f5; 
      }
      */
      
       input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      .niceInput {
      width: calc(100% - 10px);
      padding: 5px;
      } 
      input[type="date"] {
      padding: 4px 5px;
      } 
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
          /* .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #d6e0f5;
      color: #d6e0f5;
      } */
      .item {
      position: relative;
      margin: 10px 0;
      }
      .law-specialisation select {
      width: calc(50% - 8px);
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 28px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
        background-color: #93A3BC;
        border: none;
        border-radius: 8px;
        color: white;
        padding: 6px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        cursor: pointer;
      }
      button:hover {
      background: #6eb8dd;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
          }
    </style>
</head>
  
<body>
    <center> 
    <?php
        function uniqidReal($lenght = 8) {
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
            . "Your unique token ID is:</h3>";

            echo nl2br("<h2>$uuid\n</h2>");
            echo "<h3>Please keep your token ID for use on the portal and do not share it with anyone.</h3><br><br>";

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

    value='$uuid'>Send a copy of the ID to my email</button>
    </form>
    <br><br>

    <form method="post">
    
    <button type="submit"  formaction = "index.php">Return to home</button>
    </form>

    </center>
</body>
  
</html>
