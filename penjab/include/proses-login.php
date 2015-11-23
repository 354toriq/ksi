<?php

session_start();
require_once "database.php";
$id = $_POST['tx_id'];
$pass = base64_encode($_POST['tx_pas']);
$passnow = base64_decode($pass);
$sql = "SELECT * FROM `penjab` WHERE `id_penjab`='$id' AND `password`='$passnow'";
$query = mysql_query($sql);
$count = mysql_num_rows($query);
if ($count == '1') {
    $_SESSION['penjab'] = $id;
    echo '<script language="javascript">';
    echo '</script>';
    echo "<script type='text/javascript'>window.location.href='../index.php';</script>";
} else {

    echo "<script>alert('Username & Password Salah');window.location.href='../masuk_penjab.php';</script>";
}
?>