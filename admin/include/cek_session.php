<?php
session_start();
if(empty($_SESSION['adm'])){

echo "<script type='text/javascript'>window.location.href='masuk_admin.php';</script>";
}

?>