<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$mpdf->WriteHTML('<h1>This is a Title</h1><p>This is a paragraph</p>');
$mpdf->output();

?>
