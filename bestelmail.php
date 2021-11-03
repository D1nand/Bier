<?php
if (isset($_POST['submit'])) {
    $name = $_POST['naam'];
    $mailFrom = $_POST['email'];
    $aantal = $_POST['aantal'];

    $mailTo = "t88577457@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have recieved an e-mail from ".$name.".\n\n";

    mail($mailTo, $txt, $aantal. 'bier');
    header("Location: bestelpagina.html?mailsend");

}
?>