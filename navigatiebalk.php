<?php
$servername = "localhost";
$username = "username";
$password = "password";


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

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
    <ul class="nav2">
        <li><a href="#">Orderoverzicht</a></li>
        <li><a href="#">Klantenoverzicht</a></li>
    </ul>
</nav>

<div id="side-menu" class="sidenavi">
    <a href="#" class="knop-sluit" onclick="closeSideMenu()">&times;</a>
    <a href="orderoverzicht.html">Orderoverzicht</a>
    <a href="klantenoverzicht.html">Klantenoverzicht</a>
</div>

<div id="mainn">
    <h1>hidfshbfhbfhbf</h1>
</div>

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





</body>
</html>