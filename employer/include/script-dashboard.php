<?php
include 'database.php';


//$sqlemployer		=	"SELECT * FROM `employer` where id_employer = '$emp->id_employer'";
//$queryemp			=	mysql_query($sqlemployer);

$sqlpsh				=	"SELECT * FROM `perusahaan` where id_perusahaan = '$emp->id_perusahaan'";
$querypsh			=	mysql_query($sqlpsh);
$psh				=	mysql_fetch_object($querypsh);
$countpsh			=	mysql_num_rows($querypsh);

$sqllowongan			=	"SELECT * FROM `lowongan` where id_employer = '$emp->id_employer'";
$querylowongan			=	mysql_query($sqllowongan);
$countlowongan			=	mysql_num_rows($querylowongan);
while ($lowongan		=	mysql_fetch_object($querylowongan))
{
$sqlpelamar				=	"SELECT * FROM `pelamar` where id_lowongan = '$lowongan->id_lowongan'";
$querypelamar			=	mysql_query($sqlpelamar);
$countpelamar			=	mysql_num_rows($querypelamar);
}
//echo $sqllowongan;

?>
