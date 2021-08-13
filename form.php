
<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<script type="text/javascript" src="js/form_action.js"></script>
<body>
 
<form action =
"<?php 
    $prefix = "https://formsubmit.co/";
    $email = "michaelong1998@gmail.com";
    $actionable = $prefix . $email;
    echo $actionable; 
?>"
    method="post">
    SUPERMANBAIN
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Summary:<br><textarea rows="5" name="summary" cols="30"></textarea><br>
Advice Given: <br><textarea rows="5" name="advice" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit"/>
</form>