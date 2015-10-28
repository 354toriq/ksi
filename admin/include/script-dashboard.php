<?php
include 'database.php';

$sqlsekolah		=	"SELECT * FROM `sekolah`";
$querysekolah	=	mysql_query($sqlsekolah);
$countsekolah	=	mysql_num_rows($querysekolah);

$sqlpenjab		=	"SELECT * FROM `penjab`";
$querypenjab	=	mysql_query($sqlpenjab);
$countpenjab	=	mysql_num_rows($querypenjab);

$sqlsiswa		=	"SELECT * FROM `siswa`";
$querysiswa		=	mysql_query($sqlsiswa);
$countsiswa		=	mysql_num_rows($querysiswa);

$sqlpaket		=	"SELECT * FROM `paket`";
$querypaket		=	mysql_query($sqlpaket);
$countpaket		=	mysql_num_rows($querypaket);

$sqlmatpel		=	"SELECT * FROM `matpel`";
$querymatpel	=	mysql_query($sqlmatpel);
$countmatpel	=	mysql_num_rows($querymatpel);

$sqlmodul		=	"SELECT * FROM `modul`";
$querymodul		=	mysql_query($sqlmodul);
$countmodul	=	mysql_num_rows($querymodul);

$sqlemployer		=	"SELECT * FROM `employer`";
$queryemployer		=	mysql_query($sqlemployer);
$countemployer		=	mysql_num_rows($queryemployer);

$sqllowongan		=	"SELECT * FROM `lowongan`";
$querylowongan		=	mysql_query($sqllowongan);
$countlowongan	=	mysql_num_rows($querylowongan);
?>
