<?php
$conn= mysqli_connect("localhost","root","","registration") or die("connection failed");

session_start();
session_unset();
session_destroy();

header("Location: http://localhost/login_system/login.php");

?>