<?php
$dbServername = "localhost";
$dbUsername = "deb85590_p21t2";
$dbPassword = "pv9EptlJ";
$dbName = "deb85590_p21t2";

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
$sql = "INSERT INTO users (`Bedrijfsnaam`, `E-mail`, `Adres`, `Postcode`, `Factuuradres`, `Usertype`, `Wachtwoord`) 
VALUES ('$Bedrijfsnaam', '$Email', '$Adres', '$Postcode', '$Factuuradres', 'user', '$Wachtwoord');";
mysqli_query($conn, $sql);

header("Location: klantenoverzicht.php?Accounttoegevoegd");
?>