<?php
session_start();
include 'database.php';
if(empty($_SESSION['emp'])){
echo "<script type='text/javascript'>window.location.href='masuk_employer.php';</script>";
}
else
{
$id			=	$_SESSION['emp'];
$query		=	mysql_query("select * from employer where id_employer = '$id'");
$emp		=	mysql_fetch_object($query);
//$queryskl	=	mysql_query("select * from sekolah where id_sekolah = '$siswa->id_sekolah'");
//$sekolah	=	mysql_fetch_object($queryskl);
}

?>