    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bier";

        // Create connection
    // Create connection
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }



    if (isset($_POST)) {
        $un=$_POST['username'];
        $pw=$_POST['password'];


        $sql = "SELECT Email, password FROM bedrijfsnaam WHERE Email = '".$un."' AND wachtwoord = '".$pw."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // succes   if ($pw==$row["password"]) {

                

        }
        else{
        // failed

            echo  "<script>alert('invalid password/username')</script>";



        }
    }


    $conn->close();


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