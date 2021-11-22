<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="CSS.css">
</head>

<body>

    <nav class="nav">
        <span class="spanned">
             <a href="#" onclick="openSideMenu()">
                 <svg width="30" height="30">
                        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                              <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
                 </svg>
             </a>
        </span>
       
        
    </nav>
    
    <div id="side-menu" class="sidenavi">
        <a href="#" class="knop-sluit" onclick="closeSideMenu()">&times;</a>
        <a href="orderoverzicht.php">Orderoverzicht</a>
        <a href="klantenoverzicht.php">Klantenoverzicht</a>
        <a href="loginn.php">Uitloggen</a>
    </div>
    
    <div id="mainnn">
    
    <script>
        function openSideMenu(){
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('mainnn').style.marginLeft = '250px';
        }
        function closeSideMenu(){
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('mainnn').style.marginLeft = '0';
        }
    </script>
    
  
    <a href="accounttoevoegen.php" class="toevoegknop">Account Toevoegen</a>
    <h2 class="klanttekst">Klantenoverzicht</h2>
    </body>
</div>
</html>


<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bier";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error){
    die ("connection failed: " . $conn->connect_error);
}
 $sql = "SELECT Id, Bedrijfsnaam, Email, Adres, Postcode, Factuuradres FROM users ORDER BY Id";
 $result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table  id='mainnn' class='klanttabel'><tr><th>Bedrijsnaam</th><th>Email</th><th>Adres</th><th>Postcode</th><th>Factuuradres</th><th>Verwijderen</tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["Bedrijfsnaam"]."</td><td>".$row["Email"]."</td><td>".$row["Adres"]."</td><td>".$row["Postcode"]."</td><td>".$row["Factuuradres"]."</td><td>.<a href='klantenoverzicht.php?deletePost=".$row['Id']."'<span class='Verwijderen'></span>Verwijderen</a></td>";
    }
    echo '</table>';
}

if(isset($_GET['deletePost'])) {
    $stmt = $conn->prepare('DELETE FROM users WHERE Id = ?');
    $stmt->bind_param('i', $_GET['deletePost']);
    $stmt->execute();
}
?>