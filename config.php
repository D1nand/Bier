<?php 

$server = "localhost";
$user = "deb85590_p21t2";
$pass = "pv9EptlJ";
$dbname = "deb85590_p21t2";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>