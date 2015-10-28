	<?php
	include 'include/dependency.php';
	$idsoal			=	$_GET['ubah-soal'];	
	$query 			= 	mysql_query("select * from soal_modul where id_soal_modul = '$idsoal'");
	$soal			=	mysql_fetch_object($query);
	?>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title">Pertanyaan No. <?=$soal->no;?></h3>
	</div>
	<form method='post' action=''>
	<div class="panel-body">
	<div class="form-group">	
	<label>Soal :</label>
	<textarea class="ckeditor" name='soal'><?=$soal->soal?></textarea>
	</div>
	<div class="form-group">	
	<label>Jawaban :</label>
		<div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">A</span>
		<input type="text" class="form-control" name="p_a" value='<?=$soal->pa?>'required>
		</div>
		<div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">B</span>
		<input type="text" class="form-control" name="p_b" value='<?=$soal->pb?>' required>
		</div>
		<div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">C</span>
		<input type="text" class="form-control" name="p_c" required value='<?=$soal->pc?>'>
		</div>
		<div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">D</span>
		<input type="text" class="form-control" name="p_d" required value='<?=$soal->pd?>'>
		</div>
	  </div>
	  <div class="form-group">
	  <label>Kunci</label>
	  <select name='kunci' class="form-control" required>
	  <?php 
	  
	  echo "<option value='$soal->kunci'>$soal->kunci</option>";
	  ?>
	  <option>-----------------------</option>
	  <option value="A">A</option>
	  <option value="B">B</option>
	  <option value="C">C</option>
	  <option value="D">D</option>
	  </select>
	  </div>
	</div>
	<div class="panel-footer">
	<button class="btn btn-success" name="ubah">Ubah Soal</button> <a href='?edit-modul=<?=$soal->id_modul?>' class="btn btn-warning">Kembali</a>
	</form>
	</div>
	</div>	
	<?php 
	if(isset($_POST['ubah']))
	{
		$soal 	= mysql_escape_string($_POST['soal']);
		$pa   	= mysql_escape_string($_POST['p_a']);
		$pb   	= mysql_escape_string($_POST['p_b']);
		$pc   	= mysql_escape_string($_POST['p_c']);
		$pd   	= mysql_escape_string($_POST['p_d']);
		$kunci	=   $_POST['kunci'];
		//echo $kunci;
		$update = mysql_query("update soal_modul set soal = '$soal',pa = '$pa',pb = '$pb',pc = '$pc',pd = '$pd',kunci = '$kunci' where id_soal_modul = '$idsoal'");
		if($update)	{ echo "<script>alert('Soal sudah diubah');window.location.href='?ubah-soal=$idsoal'</script>";}
	}
	?>
		
		
		