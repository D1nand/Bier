<?php 

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "bier";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>