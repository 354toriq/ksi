
<?php 
$host		=	'localhost'; 
$username	=	'root'; 
$password	=	""; 
$database	=	'pkbmksi'; 
$connect	=	mysql_connect($host,$username,$password); 
	if ($connect) 
	{
	$sql=mysql_select_db($database,$connect); 
	}
	
	$bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); 
	$cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y");

//Sumber: http://phpbejo.blogspot.com/2013/10/membuat-tanggal-indonesia-dengan-php.html
//Konten adalah milik dan hak cipta phpbejo.blogspot.com
?>