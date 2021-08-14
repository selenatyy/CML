<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!--External CSS-->
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style> 

    /* Start of Navbar */
    img {
        margin-left: 45px;
    }

    .logo-name {
        font-size: 15px;
    }

    .form-button{
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
    /* End of Navbar */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

</style>

<!-- Start of Page Icon -->
<title> CML </title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
<!-- End of Page Icon -->
</head>

<body>
    <!-- Start of Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                <div class="logo-name"> 
                    Coffee Meets Legal
                </div>
            </a>
            <a href="form.php">
                <button class="form-button">Case Form</button>
            </a>
            </div>
        </div>
    </nav>
<!-- End of Navbar -->
    <div class="tab">
        <button class="tablinks" onclick="clickHandle(event, 'Info')">Case Info</button>
        <button class="tablinks" onclick="clickHandle(event, 'Lawyers')">Recommended Lawyers</button>
    </div>

    <div id="Info" class="tabcontent">
    <?php $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cml";
            $case_id = $_REQUEST["case_id"];
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if($conn === false) {
                die("ERROR: Could not connect. " 
                    . mysqli_connect_error());
            }
            // $sql = "select la_id from case_legal_areas where case_num = '$case_id';";
            $sql = "select * from caseentry where case_num = '$case_id';";
           
            $result = $conn->query($sql);
            if ($result !== false && $result-> num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h5>Facts:</h5> " . $row["facts"]. " <br><br> <h5>Advice:</h5> " . $row["advice"]. " " . "<br><br><h5>Email:</h5>" . $row["client_email"]. "<br>";
            } else {
                  echo "<br> 0 results";
            }
    ?>
    </div>

    <div id="Lawyers" class="tabcontent">
        <?php $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cml";
            $case_id = $_REQUEST["case_id"];
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if($conn === false) {
                die("ERROR: Could not connect. " 
                    . mysqli_connect_error());
            }
            // $sql = "select la_id from case_legal_areas where case_num = '$case_id';";
            $sql = "select * from lawyer where lawyer_id in 
            (select lawyer_id from lawyer_legal_areas where la_id in (select la_id from case_legal_areas where case_num = '$case_id'    ));";
           
            $result = $conn->query($sql);
            if ($result !== false && $result-> num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h5 >Name: </h5> " . $row["lawyer_name"]. "<h5>Email:</h5>" . $row["lawyer_email"]. "</h5>"
                    ."<h5>Description:</h5> " . $row["lawyer_description"]
                    ."<form  action = 'https://formsubmit.co/". $row["lawyer_email"] . "' method='post'> <div class='btn-block'>" 
                        ."<input type='hidden' name='_subject' value='New case note!'>"
                        ."<input type='hidden' name='Notification' value='Dear " . $row["lawyer_name"].", a prospect on Coffee Meets Legal has expressed interest in your services and" 
                        ."would like to share case information with you. Use this token on Coffee Meets Legal to access the case note.'>"
                        ."<button type='submit' formmethod='post' name='Token' value='$case_id' href='/'>Share Case Details</button>"
                    ."</div> </form><br><br>";
                  }
            } else {    
            }
    ?>
    </div>

    <script>
    function clickHandle(evt, tabName) {
    let i, tabcontent, tablinks;

    // This is to clear the previous clicked content.
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Set the tab to be "active".
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Display the clicked tab and set it to active.
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    }
    </script>

</body>
