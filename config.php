<?php 

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "login_register_pure_coding";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>