<?php
$direktori = ".";
foreach ($_FILES["myfiles"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["myfiles"]["tmp_name"][$key];
        $name = $_FILES["myfiles"]["name"][$key];
        move_uploaded_file($tmp_name, $direktori."/".$name);
		$con=mysql_connect('localhost','root','');
		mysql_select_db('dragndrop2',$con);
		$skrip="insert into `test` values('$name')";
		$query=mysql_query($skrip);
		
        echo "File $name berhasil diupload <br>";
    }
}
?>