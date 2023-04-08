<!DOCTYPE html>
<html lang="en">
<?php
include("./connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
    <title>Trang chủ</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animsition.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php"> <img style="width:75px; height:35px;" class="img-rounded" src="../assets/img/logo.png" alt=""> </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="index.php">HOME <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="restaurants.php">SHOP<span class="sr-only"></span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="news.php">NEWS<span class="sr-only"></span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="contact.php">CONTACT<span class="sr-only"></span></a> </li>
                    <?php
                    if (empty($_SESSION["user_id"])) // if user is not login
                    {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link active">LOGIN</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">REGISTER</a> </li>';
                    } else {
                        echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">CART</a> </li>';
                        echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">LOGOUT</a> </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="../js/jquery.min.js"></script>
<script src="../js/tether.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/animsition.min.js"></script>
<script src="../js/bootstrap-slider.min.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/headroom.js"></script>
<script src="../js/foodpicky.min.js"></script>