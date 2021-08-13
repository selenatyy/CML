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
    body {
    background: #CCDDE2;
    font-family: 'Open Sans', sans-serif;
    }

    .search {
    width: 100%;
    position: relative;
    display: flex;
    }

    .searchTerm {
    width: 100%;
    border: 3px solid #93A3BC;
    border-right: none;
    padding: 5px;
    height: 40px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
    }

    .searchTerm:focus {
    color: #93A3BC;
    }

    .searchButton {
    width: 40px;
    height: 40px;
    border: 1px solid #93A3BC;
    background: #93A3BC;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    }

    .wrap {
    width: 30%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }

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

<!-- Start of Search Bar -->
    <div class="wrap">
        <form class="search" action="result.php">
            <input type="text" class="searchTerm" placeholder="Please enter your Case ID">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
<!-- End of Search Bar -->
</body>
