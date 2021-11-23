<!DOCTYPE html>
<html>
    <Head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="CSS.css">
    </Head>
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
      </center>
    </body>
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
 $sql = "SELECT Id, Naam, Adres FROM orders ORDER BY Id";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     echo "<table class='Orders'><tr><th>Id</th><th>Naam</th><th>Adres</th></tr>";
     while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row["Id"]."</td><td>".$row["Naam"]."</td><td>".$row["Adres"]."</td>";
 }
}
?>