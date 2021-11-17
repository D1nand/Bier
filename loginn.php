
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="vieuwport" content="width=device-width, initial-scale=1.0">



            <link rel="stylesheet"  type= "text/css" href="CSS.css">

            <title> Login Scherm</title>
    </head>
    
    <body class="lichaam">
        
        <div class="container">
        <form action="loginn.php" method="POST">
        <form class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input name="email" type="E-mail"  placeholder="E-mail" required>
                </div>
                <div class="input-group">
                    <input name="wachtwoord" type="Wachtwoord"  placeholder="Wachtwoord" required>
                </div>
                <div class="input-group">
                    <button class="btn">Login</button>
                    </div>
                    <p style="text-decoration:underline " class="login-register-text"> <a href="loginn.html">Beheerder login</a> </p>
                </form>
            </div>


    </body>
    </html>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bier";

        // Create connection
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }



    if (isset($_POST)) {
        $un=$_POST['email'];
        $pw=$_POST['wachtwoord'];

 
        $sql = "SELECT email  FROM users WHERE Email = '".$un."' AND wachtwoord = '".$pw."'";
        $result = $conn->query($sql);
 
        if ($result->num_rows > 0) {
        // succes   if ($pw==$row["password"]) {
            

        }
        else{ 
        // failed

            echo  "<script>alert('onjuist wachtwoord/username')</script>";
            


        }
    }


    $conn->close();
?>