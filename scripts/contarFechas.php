<?php
$firstDate = date("d-m-Y", strtotime($primeraFecha));
$secondDate = date("d-m-Y", strtotime($segundaFecha));


$dateDifference = abs(strtotime($secondDate) - strtotime($firstDate));

$years  = floor($dateDifference / (365 * 60 * 60 * 24));
$months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
$days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));

//con la siguiente linea se imprime el resultado, usala y configurala directamente en el archivo en el que la vayas a utilizar, esta no la toques
//echo $years." year,  ".$months." months and ".$days." days";

