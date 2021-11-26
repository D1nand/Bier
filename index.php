<?php 

include 'config.php';

session_start();

error_reporting(0);

//if (isset($_SESSION['Admin'])) {
 //   header("Location: orderoverzicht.html");
//}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM users WHERE `E-mail`='$email' AND `Wachtwoord`='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: Bestelpagina(zak).php?email=$email");
	} else {
		echo "<script>alert('Woops! Email of wachtwoord is fout.')</script>";
	}
}
if($row["Usertype"]=="admin")

    header("location: orderoverzicht.php")


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
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-text">Ga <a class="particulieren-text" href="Bestelpagina.html">hier</a> verder zonder account .</p>
		</form>
	</div>
</body>
</html>