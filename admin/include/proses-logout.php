<?php

session_start();

// menghapus session username
unset($_SESSION['adm']);
session_destroy();
echo "<script type='text/javascript'>alert('Anda berhasil keluar');
							window.location.href='../masuk_admin.php';</script>";

?>