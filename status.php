<?php

// update query maken met id er in
$mysqli = new mysqli("localhost","root","","bier");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$id= $_GET['id'];





$sql = "UPDATE orders SET Status = 1 WHERE id = $id";
$update = $mysqli->query($sql) ;

if ( $update ){

    $sql1 = "SELECT  `Naam`, `E-mail` FROM `orders` WHERE `id` = $id";

    $result = $mysqli->query($sql1) or die($mysqli->error);
    
    while($row = $result->fetch_assoc()) {
    
    
        $naam = $row['Naam'];
        $email= $row['E-mail'];
    
        }


    $to = "$email";
    $subject = "Bierbrouwerij DE BOER";

    $BOUNDARY="anystring";

    $headers =<<<END
    From: <t88577457@gmail.com>
    Content-Type: multipart/mixed; boundary=$BOUNDARY
    END;

    $body =<<<END
    --$BOUNDARY
    Content-Type: text/plain
    
    U bestelling #$id is verzonden.
    levertijd : 2-3 werkdagen.

    END;


    mail( $to, $subject, $body, $headers );
    header("location: orderoverzicht.php");

}

echo $mysqli->error;