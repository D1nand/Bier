<?php
$servername = "localhost";
$mail = "proteine@gmail.com";
$username = "Kevin";
$password = "";
$dbname = "biermanagement";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());

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