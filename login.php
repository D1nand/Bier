<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "biermanagement";

       // Create connection
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);



}
$sql = "SELECT id, firstname, lastname FROM Myguest";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    //output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. "" . $row["lastname"]. "<br>";
    }
}else {
    echo "0 results";
}

mysqli_close($conn)





?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="vieuwport" content="width=device-width, initial-scale=1.0">



        <link rel="stylesheet"  type= "text/css" href="CSS.css">

        <title> Login Scherm</title>
   </head>
   <bodyy>
       <div class="container">
           <form class="login-email">
               <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
               <div class="input-group">
                   <input type="E-mail" placeholder="E-mail" required>
               </div>
               <div class="input-group">
                   <input type="Wachtwoord" placeholder="Wachtwoord" required>
               </div>
               <div class="input-group">
                   <button class="btn">Login</button>
                </div>
                <p class="login-register-text">Ben je beheerder? <a href="login.html">Log hier in</a> </p>
            </form>
        </div>


   </bodyy>
   </html>