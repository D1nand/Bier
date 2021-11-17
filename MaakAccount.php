<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bier";

$Bedrijfsnaam = $_POST['Bedrijfsnaam'];
$Email = $_POST['Email'];
$Adres = $_POST['Adres'];
$Postcode = $_POST['Postcode'];
$Factuuradres = $_POST['Factuuradres'];
$Wachtwoord = $_POST['Wachtwoord'];

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error){
    die ("connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO users (Bedrijfsnaam, Email, Adres, Postcode, Factuuradres, Wachtwoord) 
VALUES ('$Bedrijfsnaam', '$Email', '$Adres', '$Postcode', '$Factuuradres', '$Wachtwoord');";
mysqli_query($conn, $sql);

header("Location: klantenoverzicht.php?Accounttoegevoegd");
?>