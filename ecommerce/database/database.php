<?php
// starting batabase connection and session
$db_host = "localhost";
$db_user = "root";
// password from phpmyadmin
$db_pass = "";
$db_name = "ecommerce2";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("unable to connect");
session_start();

?>