<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="CSS.css">
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
    <script type="text/javascript" src="wijzigen.js"></script>
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
    
  
    <a href="accounttoevoegen.php" class="loginknop">Account Toevoegen</a><br><br><br><br>
    <center>
    <h1>Klantenoverzicht</h1>
   

    </body>

</html>


<?php
session_start();
$host = "localhost";
$user = "deb85590_p21t2";
$password = "pv9EptlJ";
$name = "deb85590_p21t2";

$conn = mysqli_connect($host, $user, $password, $name);
if ($conn->connect_error){
    die ("connection failed: " . $conn->connect_error);
}
 $sql = "SELECT `id`, `Bedrijfsnaam`, `E-mail`, `Adres`, `Postcode`, `Factuuradres` FROM users WHERE Usertype='user' ORDER BY id";
 $result = mysqli_query($conn, "select * from users WHERE Usertype='user'");
 
?>
<?php
if ($result -> num_rows > 0) {
    echo "<table class='klanttabel'><tr><th>Bedrijfsnaam</th><th>E-mail</th><th>Adres</th><th>Postcode</th><th>Factuuradres</th><th>Verwijderen</tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>"?>
      <tr>
<td contenteditable="true" onkeydown="return (event.keyCode!=13);" data-old_value="
      <?php echo $row["Bedrijfsnaam"];?>" onBlur="saveInlineEdit(this,'Bedrijfsnaam','<?php echo $row["id"]; ?>')"  onClick="highlightEdit(this);"><?php echo $row["Bedrijfsnaam"]; ?></td>
      <td contenteditable="true" onkeydown="return (event.keyCode!=13);" data-old_value="
      <?php echo $row["E-mail"];?>" onBlur="saveInlineEdit(this,'E-mail','<?php echo $row["id"]; ?>')"  onClick="highlightEdit(this);"><?php echo $row["E-mail"]; ?></td>
      <td contenteditable="true" onkeydown="return (event.keyCode!=13);" data-old_value="
      <?php echo $row["Adres"];?>" onBlur="saveInlineEdit(this,'Adres','<?php echo $row["id"]; ?>')"  onClick="highlightEdit(this);"><?php echo $row["Adres"]; ?></td>
      <td contenteditable="true" onkeydown="return (event.keyCode!=13);" data-old_value="
      <?php echo $row["Postcode"];?>" onBlur="saveInlineEdit(this,'Postcode','<?php echo $row["id"]; ?>')"  onClick="highlightEdit(this);"><?php echo $row["Postcode"]; ?></td>
      <td contenteditable="true" onkeydown="return (event.keyCode!=13);" data-old_value="
      <?php echo $row["Factuuradres"];?>" onBlur="saveInlineEdit(this,'Factuuradres','<?php echo $row["id"]; ?>')"  onClick="highlightEdit(this);"><?php echo $row["Factuuradres"]; ?></td>
      <?php echo "<td><a href='klantenoverzicht.php?deletePost=".$row['id']."'<span class='Verwijderen'></span>Verwijderen</a></td>";
    }
    echo '</table>';
}

if(isset($_GET['deletePost'])) {
    $stmt = $conn->prepare('DELETE FROM users WHERE Id = ?');
    $stmt->bind_param('i', $_GET['deletePost']);
    $stmt->execute();
}
?>
