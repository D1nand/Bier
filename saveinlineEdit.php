<?php
session_start();
$host = "localhost";
$user = "deb85590_p21t2";
$password = "pv9EptlJ";
$dbname = "deb85590_p21t2";


$conn = mysqli_connect($host, $user, $password, $dbname);
if ($conn->connect_error){
    die ("connection failed: " . $conn->connect_error);
}
$sql = "UPDATE users set " . $_REQUEST['column'] . " = '".$_REQUEST['value']."' WHERE id='".$_REQUEST['id']."'";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
echo "saved";
?>