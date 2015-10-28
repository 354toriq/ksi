<?php

session_start();

// menghapus session username
unset($_SESSION['emp']);
session_destroy();
echo "<script type='text/javascript'>alert('Anda berhasil keluar');
							window.location.href='../masuk_employer.php';</script>";

?>