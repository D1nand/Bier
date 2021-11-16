<?php
require_once __DIR__ . '/bibliotheek/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>This is a Title</h1><p>This is a paragraph</p>');
$mpdf->output();

?>
