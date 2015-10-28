<?php

session_start();

// menghapus session username
unset($_SESSION['penjab']);
session_destroy();
echo "<script type='text/javascript'>alert('Anda berhasil keluar');
							window.location.href='../masuk_siswa.php';</script>";

?>