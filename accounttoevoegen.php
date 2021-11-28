<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="CSS.css">
</head>

<body>
<a class="terugklantoverzicht" href="klantenoverzicht.php">Terug</a>

<form action="MaakAccount.php" method="POST" class="accountformulier">
    
        <input class="f" type="text" name="Bedrijfsnaam" placeholder="Bedrijfsnaam" required>
        <br>
        <input class="f" type="email" name="E-mail" placeholder="E-mail" required>
        <br>
        <input class="f" type="text" name="Adres" placeholder="Adres" required>
        <br>
        <input class="f" type="text" name="Postcode" placeholder="Postcode" required>
        <br>
        <input class="f" type="text" name="Factuuradres" placeholder="Factuuradres" required>
        <br>
        <input class="f" type="password" name="Wachtwoord" placeholder="Wachtwoord" required>
        <br>
        <button class="mab" type="submit" name="submit">Maak account</button>
</form>

    </body>