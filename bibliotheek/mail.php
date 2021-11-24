<?php


if (isset($_POST['submit'])) {

    $mysqli = new mysqli("localhost","root","","bier");

    if ( $mysqli->connect_error ) {
        die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
    }

    
    
    $naam = $_POST['naam'];
    $email= $_POST['email'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $aantal = $_POST['aantal'];
    $datum =    date("Y-m-d");
    $totaalprijs = $_POST['prijs']+$_POST['prijs']+$_POST['btw'];

    
    
    $sql = "INSERT INTO `betaling`(`Naam`, `E-mail`, `Adres`, `Postcode`, `Aantal`, `Datum`) VALUES ('$naam', '$email', '$adres', '$postcode', $aantal, '$datum')";
    
    $insert = $mysqli->query($sql);
    
    
    if ( $insert ) {
            
        
            //call the FPDF library
            require('fpdf.php');
            
            $pdf = new FPDF('P','mm','A4');
            //add new page
            $pdf->AddPage();
            //set font to arial, bold, 14pt
            $pdf->SetFont('Arial','B',14);
            
            //Cell(width , height , text , border , end line , [align] )
            
            $pdf->Cell(130 ,5,'BIERBROUWERIJ DE BOER',0,0);
            $pdf->Cell(59 ,5,'FACTUUR',0,1);//end of line
            
            //set font to arial, regular, 12pt
            $pdf->SetFont('Arial','',12);
            
            $pdf->Cell(130 ,5,'t88577457@gmail.com',0,0);
            $pdf->Cell(25 ,5,'Datum',0,0);
            $pdf->Cell(34 ,5,date("d-m-Y"),0,1);//end of line
            
            
            $pdf->Cell(130 ,5,'',0,0);
            $pdf->Cell(25 ,5,'Factuur #',0,0);
            $pdf->Cell(34 ,5,$mysqli->insert_id,0,1);//end of line
            
            
            //make a dummy empty cell as a vertical spacer
            $pdf->Cell(189 ,10,'',0,1);//end of line
            
            //billing address
            $pdf->Cell(100 ,5,'Aan:',0,1);//end of line
            
            //add dummy cell at beginning of each line for indentation
            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5, $_POST['naam'] ,0,1);
            
            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5,$_POST['adres'],0,1);
            
            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5,$_POST['postcode'],0,1);
            
            $pdf->Cell(10 ,5,'',0,0);
            $pdf->Cell(90 ,5,$_POST['email'],0,1);
            
            //make a dummy empty cell as a vertical spacer
            $pdf->Cell(189 ,10,'',0,1);//end of line
            
            //invoice contents
            $pdf->SetFont('Arial','B',12);
            
            $pdf->Cell(125 ,5,'Omschrijving',1,0);
            $pdf->Cell(30 ,5,'Aantal',1,0);
            $pdf->Cell(34 ,5,'Prijs',1,1);//end of line
            
            $pdf->SetFont('Arial','',12);
            
            //Numbers are right-aligned so we give 'R' after new line parameter
            
            $pdf->Cell(125 ,5,'Bier',1,0);
            $pdf->Cell(30 ,5,$_POST['aantal'],1,0);
            $pdf->Cell(34 ,5,'',1,1,'R');//end of line
            
            $pdf->Cell(125 ,5,'',0,0);
            $pdf->Cell(30 ,5,'Subtotaal',0,0);
            $pdf->Cell(4 ,5,'$',1,0);
            $pdf->Cell(30 ,5,$_POST['prijs'],1,1,'R');//end of line
            
            $pdf->Cell(125 ,5,'',0,0);
            $pdf->Cell(30 ,5,'BTW',0,0);
            $pdf->Cell(4 ,5,'$',1,0);
            $pdf->Cell(30 ,5,$_POST['btw'],1,1,'R');//end of line
            
            $pdf->Cell(125 ,5,'',0,0);
            $pdf->Cell(30 ,5,'Verzendkosten',0,0);
            $pdf->Cell(4 ,5,'$',1,0);
            $pdf->Cell(30 ,5,$_POST['verzendkosten'],1,1,'R');//end of line
            
            $pdf->Cell(125 ,5,'',0,0);
            $pdf->Cell(30 ,5,'Totaalprijs',0,0);
            $pdf->Cell(4 ,5,'$',1,0);
            $pdf->Cell(30 ,5,$totaalprijs,1,1,'R');//end of line
            
            $naam= $_POST['naam'];
            $to = $_POST['email'];
            $subject = "Bierbrouwerij DE BOER";
            
            $separator = md5(time());
            
            $eol = PHP_EOL;
            
            // attachment name
            
            $pdfdoc = $pdf->Output("", "S");
            $attachment = chunk_split(base64_encode($pdfdoc));
            
            $BOUNDARY="anystring";
            
            $headers =<<<END
            Content-Type: multipart/mixed; boundary=$BOUNDARY
            END;
            
            $body =<<<END
            --$BOUNDARY
            Content-Type: text/plain
            
            Geachte $naam, in de bijlage vind u de factuur voor de door u geplaatste bestelling.
                        
            
            Betaal: http://localhost/Bierverkoopmanagement/bibliotheek/Betaal.php?id=$mysqli->insert_id 
            
            --$BOUNDARY
            Content-Type: application/pdf
            Content-Transfer-Encoding: base64
            Content-Disposition: attachment; filename="factuur.pdf"
            
            $attachment.$eol.$eol
            --$BOUNDARY--
            END;
            
            mail( $to, $subject, $body, $headers );
            header("location: /Bierverkoopmanagement/Bestelpagina.html");

            
            
    } else {
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }
    
    $mysqli->close();
     }

 ?>
