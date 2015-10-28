<?php
session_start();
require_once "database.php";
$id			=	$_POST['tx_id'];
$pass		=	base64_encode($_POST['tx_pas']);
$passnow	=	base64_decode($pass);
$sql		=	"SELECT * FROM `siswa` WHERE `id_siswa`='$id' AND `password`='$passnow'";
$query		=	mysql_query($sql);
$count		=	mysql_num_rows($query);
	
	if ($count) 
	{		
			
			$_SESSION['siswa']	=	$id;
			echo '<script language="javascript">';
			echo 'alert("Login sebagai siswa")';
			echo '</script>';			
			echo "<script type='text/javascript'>window.location.href='../index.php';</script>"; 
			
			
			
	}
	else
	{
		
		echo "<script>alert('Username & Password Salah');window.location.href='../masuk_siswa.php';</script>";
	}
	
    


?>