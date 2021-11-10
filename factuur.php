<?php

//index.php

$message = '';

$connect = new PDO("mysql:host=localhost;dbname=Bier", "root", "");

function fetch_users_data($connect)
{
 $query = "SELECT * FROM users";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '
 <div class="table-responsive">
  <table class="table table-striped table-bordered">
   <tr>
    <th>Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Postal Code</th>
    <th>Country</th>
   </tr>
 ';
 foreach($result as $row)
 {
  $output .= '
   <tr>
    <td>'.$row["Bedrijfsnaam"].'</td>
    <td>'.$row["Email"].'</td>
    <td>'.$row["Adres"].'</td>
    <td>'.$row["Postcode"].'</td>
    <td>'.$row["Factuuradres"].'</td>
   </tr>
  ';
 }
 $output .= '
  </table>
 </div>
 ';
 return $output;
}

if(isset($_POST["action"]))
{
 include('pdf.php');
 $file_name = md5(rand()) . '.pdf';
 $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html_code .= fetch_users_data($connect);
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 file_put_contents($file_name, $file);
 
 $mail = new PHPMailer;
 $mail->Port = '80';        //Sets the default SMTP server port
 $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
 $mail->Username = 'xxxxxxxxxx';     //Sets SMTP username
 $mail->Password = 'xxxxxxxxxx';     //Sets SMTP password
 $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
 $mail->From = 'info@webslesson.info';   //Sets the From email address for the message
 $mail->FromName = 'Webslesson.info';   //Sets the From name of the message
 $mail->AddAddress('t88577457@gmail.com');  //Adds a "To" address
 $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
 $mail->IsHTML(true);       //Sets message type to HTML    
 $mail->AddAttachment($file_name);         //Adds an attachment from a path on the filesystem
 $mail->Subject = 'Customer Details';   //Sets the Subject of the message
 $mail->Body = 'Please Find Customer details in attach PDF File.';    //An HTML or plain text message body
 if($mail->Send())        //Send an Email. Return true on success or false on error
 {
  $message = '<label class="text-success">Customer Details has been send successfully...</label>';
 }
 unlink($file_name);
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Create Dynamic PDF Send As Attachment with Email in PHP</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Create Dynamic PDF Send As Attachment with Email in PHP</h3>
   <br />
   <form method="post">
    <input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
   </form>
   <br />
   <?php
   echo fetch_users_data($connect);
   ?>   
  </div>
  <br />
  <br />
 </body>
</html>
