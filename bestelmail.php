<?php
 
 if (isset($_POST['submit'])) {

$mysqli = new mysqli("localhost","root","","bier");

if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
}

$name = $_POST['naam'];
$name2 = $_POST['adres'];
$name3 = $_POST['aantal'];


$sql = "INSERT INTO `orders`(`Name`, `Adres`, `Number`) VALUES ('$name', '$name2', $name3)";

echo $sql;
$insert = $mysqli->query($sql);


if ( $insert ) {
    echo "Succes! Row ID: {$mysqli->insert_id}";
} else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
}

$mysqli->close();
 }



if (isset($_POST['submit'])) {
    $name = $_POST['naam'];
    $mailFrom = $_POST['email'];
    $aantal = $_POST['aantal'];

    $mailTo = "t88577457@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have recieved an e-mail from ".$name.".\n\n";

    mail($mailTo, $txt, $aantal. 'bier');
    header("Location: bestelpagina.html?mailsend");

}
?>