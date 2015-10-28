<?php
session_start();

if(empty($_SESSION['penjab'])){

echo "<script type='text/javascript'>window.location.href='masuk_penjab.php';</script>";
}
else
{
include 'database.php';
$id			=	$_SESSION['penjab'];
$query		=	mysql_query("select * from penjab where id_penjab = '$id'");
$penjab		=	mysql_fetch_object($query);
$queryskl	=	mysql_query("select * from sekolah where id_penjab = '$id'");
$sekolah	=	mysql_fetch_object($queryskl);


}

?>