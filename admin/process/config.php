<?php
$servername = "localhost";
$username= "root";
$password = "";
$database = "abph_ecom_db";

// Creatng database  connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check Database Connection

if(!$conn) {
    die('connection failed: ".mysqli_connect_error()"');
}


?>