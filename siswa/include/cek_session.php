<?php
session_start();
include 'database.php';
if(empty($_SESSION['siswa'])){

echo "<script type='text/javascript'>window.location.href='masuk_siswa.php';</script>";
}
else
{
$id			=	$_SESSION['siswa'];
$query		=	mysql_query("select * from siswa where id_siswa = '$id'");
$siswa		=	mysql_fetch_object($query);
$queryskl	=	mysql_query("select * from sekolah where id_sekolah = '$siswa->id_sekolah'");
$sekolah	=	mysql_fetch_object($queryskl);
}

?>