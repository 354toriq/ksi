<?php
include 'database.php';


$sqlpaket		=	"SELECT * FROM `paket` where id_paket = '$siswa->id_paket'";
$querypaket		=	mysql_query($sqlpaket);
$countpaket		=	mysql_num_rows($querypaket);

$sqlmatpel		=	"SELECT * FROM `matpel` where id_paket = '$siswa->id_paket'";
$querymatpel            =	mysql_query($sqlmatpel);
$countmatpel            =	mysql_num_rows($querymatpel);

$sqlmodul		=	"SELECT * FROM `modul` where id_matpel = '' ";
$querymodul		=	mysql_query($sqlmodul);
$countmodul             =	mysql_num_rows($querymodul);

?>
