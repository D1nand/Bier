<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="CSS.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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
        <a href="index.php">Uitloggen</a>
    </div>
    
    <div id="mainn">

    
    <script>
        function openSideMenu(){
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('mainn').style.marginLeft = '250px';
        }
        function closeSideMenu(){
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('mainn').style.marginLeft = '0';
        }
    </script>
       
     <center>
        <h1>Orderoverzicht</h1>
    </body>
</html>
<?php
$dbServername = "localhost";
$dbUsername = "deb85590_p21t2";
$dbPassword = "pv9EptlJ";
$dbName = "deb85590_p21t2";

$mysqli = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if ($mysqli->connect_error){
    die ("connection failed: " . $mysqli->connect_error);
}
 $sql = "SELECT `id`, `Naam`, `E-mail`, `Adres`, `Postcode`, `Aantal`, `Datum`, `Status` FROM orders ORDER BY Id";
 $result = $mysqli->query($sql);

     echo "<table class='Orders'><tr><th>id</th><th>Naam</th><th>Adres</th><th>Postcode</th><th>Aantal</th><th>E-mail</th><th>Datum</th><th>Status</th></tr>";
   
        
 
 if ($result = $mysqli->query($sql)) {
    foreach ($result as $row) {
    echo "

    <tr>
        <td>" . $row['id'] . "</td> 
        <td>" . $row['Naam']  . "</td>
        <td> " . $row['Adres'] .  "</td>
        <td>" . $row['Postcode'] . "</td>
        <td>" . $row['Aantal'] . "</td>
        <td>". $row['E-mail'] . "</td>
        <td> " . $row['Datum'] . "</td>";
        if($row['Status'] == 0){
           echo "<td> <a class='afgerond' href='status.php?id=".$row['id']."'><i class='fas fa-check-circle'></i></a></td>";
        }else{
           echo "<td> <i class='far fa-check-circle'></i></td>";
        }
        }
}

?>