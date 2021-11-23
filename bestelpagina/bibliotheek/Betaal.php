<?php
 
 
$mysqli = new mysqli("localhost","root","","bier");

if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
}
    
    $id= $_GET['id'];
    

    $sql = "SELECT `Naam`, `E-mail`, `Adres`, `Postcode`, `Aantal`, `Datum`, `ID` FROM `betaling` WHERE ID=$id";

    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc()) {

    $naam = $row['Naam'];
    $email= $row['E-mail'];
    $adres = $row['Adres'];
    $postcode = $row['Postcode'];
    $aantal = $row['Aantal'];
    $datum =    $row['Datum'];
    $id_2 = $row["ID"];

    echo '<br><br><br><center><p> Bestelling betaald </p></center><br><br>';
    echo '<center><p> terug naar <a href="/Bierverkoopmanagement/bestelpagina/Bestelpagina.html">bestelpagina</a> </p></center>';

    }
    
         

    if ($result->num_rows > 0) {

        
        $sql2 = "INSERT INTO `orders`(`Naam`, `E-mail`, `Adres`, `Postcode`, `Aantal`, `Datum`, `ID` ) VALUES ('$naam', '$email', '$adres', '$postcode', '$aantal', '$datum', '$id_2')";
        
        $insert = $mysqli->query($sql2);

        if ( $insert ) {

           $sql3 = "DELETE FROM `betaling` WHERE ID=$id";
           $delete = $mysqli->query($sql3);


            
            $Dag = date("d");
            $Maand = date("m");
            $jaar = date("Y");
            $dag2 = $Dag-1;
            $datum2 = $jaar.'-'.$Maand.'-'.$dag2;

            $sql4 = "DELETE FROM `betaling` WHERE Datum=$datum2";
            $mysqli->query($sql4);


           if ( $delete ) {

            $to = "t88577457@gmail.com";
            $subject = "Bierbrouwerij DE BOER";

            $BOUNDARY="anystring";

            $headers =<<<END
            From: <$email>
            Content-Type: multipart/mixed; boundary=$BOUNDARY
            END;

            $body =<<<END
            --$BOUNDARY
            Content-Type: text/plain
            
            Er is een bestelling geplaatst door $naam
            http://localhost/Bierverkoopmanagement/orderoverzicht.php#

            END;


            mail( $to, $subject, $body, $headers );



            echo '<script language="javascript">';
            echo 'alert("Succesvol betaald!")';
            echo '</script>';

    


        } else {
            die("Error: {$mysqli->errno} : {$mysqli->error}");
        }

        } else {
            die("Error: {$mysqli->errno} : {$mysqli->error}");
        }
        
    }

     else {
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }
    
    $mysqli->close();


?>