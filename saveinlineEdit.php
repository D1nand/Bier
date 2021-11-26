<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bier";

$conn = mysqli_connect($host, $user, $password, $dbname);
if ($conn->connect_error){
    die ("connection failed: " . $conn->connect_error);
}
$sql = "UPDATE users set " . $_REQUEST['column'] . " = '".$_REQUEST['value']."' WHERE id='".$_REQUEST['id']."'";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
echo "saved";
?>