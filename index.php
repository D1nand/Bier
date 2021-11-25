<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['Admin@gmail.com'])) {
    header("orderoverzicht.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: orderoverzicht.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="CSS.css">

	<title>Login Form</title>
</head>
<body class="lichaam">
        
        <div class="container">
        <form  name="loginn" class="login-email" action="bestelpagina(zak).html." method="POST"> 
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
                    <p style="text-decoration:underline " class="login-register-text"> <a href="">Beheerder login</a> </p>
                </form>
            </div>

    </body>
</html>