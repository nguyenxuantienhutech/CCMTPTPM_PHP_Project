<?php

//main connection file for both admin & front end
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "test";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
mysqli_set_charset($db,"utf8");
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>