<?php
 
 
$mysqli = new mysqli("localhost","root","","bier");

if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
}

    $naam = "SELECT `Naam` FROM `betaling` WHERE ID="
    $email= $_POST['email'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $aantal = 
    $datum =    date("Y-m-s");
    $id= 
    
    
    $sql = "INSERT INTO `orders`(`Naam`, `E-mail`, `Adres`, `Postcode`, `Aantal`, `Datum`) VALUES ('$naam', '$email', '$adres', '$postcode', $aantal, '$datum')";
    
    echo $sql;
    $insert = $mysqli->query($sql);
    
    
    if ( $insert ) {
        echo "Succes! Row ID: {$mysqli->insert_id}";
    } else {
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }
    
    $mysqli->close();


?>