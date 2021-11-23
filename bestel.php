<?php
 
$Dag = date("d");
$Maand = date("m");
$jaar = date("Y");
$dag2 = $Dag-4;
$datum = $jaar.'-'.$Maand.'-'.$dag2;

echo $datum

 ?>