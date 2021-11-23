<?php
 
 
$mysqli = new mysqli("localhost","root","","bier");

if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
}

   
    $id= $_GET['id'];
    

    $sql = "SELECT `Naam`, `E-mail`, `Adres`, `Postcode`, `Aantal`, `Datum`, `ID` FROM `betaling` WHERE ID=$id";

    $result = $mysqli->query($sql);

    echo "<table  id='mainnn' class='order'><tr><th>Naam</th><th>E-mail</th><th>Adres</th><th>Postcode</th><th>Aantal</th><th>Datum</th><th>ID</tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["Naam"]."</td><td>".$row["E-mail"]."</td><td>".$row["Adres"]."</td><td>".$row["Postcode"]."</td><td>".$row["Aantal"]."</td><td>".$row["Datum"]."</td><td>".$row["ID"]."</td>";
        }
         echo '</table> <br> <br>';

         echo "<button name='submit' type='submit' button'>Betaal</button>";

         if (isset($_POST['submit'])) {
         

    if ($result->num_rows > 0) {
        
    }
}
     else {
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }
    
    $mysqli->close();


?>