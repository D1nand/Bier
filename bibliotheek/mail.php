<?php
//call the FPDF library
require('fpdf.php');

$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'GEMUL APPLIANCES.CO',0,0);
$pdf->Cell(59 ,5,'FACTUUR',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Street Address]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[City, Country, ZIP]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Aan:',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5, '-' ,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Phone]',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Beschrijving',1,0);
$pdf->Cell(25 ,5,'Aantal',1,0);
$pdf->Cell(34 ,5,'Prijs',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,'Bier',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'?',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotaal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'?',1,1,'R');//end of line



$pdf->Cell(125 ,5,'',0,0);
$pdf->Cell(30 ,5,'Verzendkosten',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'?',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Totaalprijs',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'?',1,1,'R');//end of line


$to = "t88577457@gmail.com";
$subject = "mail with attachment";

$separator = md5(time());

$eol = PHP_EOL;

// attachment name

$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

$BOUNDARY="anystring";

$headers =<<<END
From: Your Name <abc@gmail.com>
Content-Type: multipart/mixed; boundary=$BOUNDARY
END;

$body =<<<END
--$BOUNDARY
Content-Type: text/plain

See attached file!

--$BOUNDARY
Content-Type: application/pdf
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename="factuur.pdf"

$attachment.$eol.$eol
--$BOUNDARY--
END;

mail( $to, $subject, $body, $headers );