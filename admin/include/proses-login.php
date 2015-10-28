<?php
session_start();
require_once "database.php";
$usnm		=	$_POST['tx_usnm'];
$pass		=	base64_encode($_POST['tx_pas']);
$passnow	=	base64_decode($pass);
$sql		=	"SELECT * FROM `admin` WHERE `username`='$usnm' AND `password`='$passnow'";
$query		=	mysql_query($sql);
$count		=	mysql_num_rows($query);
	
	if ($count) 
	{		
			
			$_SESSION['adm']=$usnm;
			echo '<script language="javascript">';
			echo 'alert("Login sebagai admin")';
			echo '</script>';			
			echo "<script type='text/javascript'>window.location.href='../index.php';</script>"; 
			
			
			
	}
	else
	{
		
		echo "<script>alert('Username & Password Salah');window.location.href='../masuk_admin.php';</script>";
	}
	
    


?>