	<?php
	include 'include/dependency.php';
	$idmod			=	$_GET['edit-modul'];	
	$query 			= 	mysql_query("select * from modul where id_modul = '$idmod'");
	$mod			=	mysql_fetch_object($query);
	?>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title">Detail Modul - <?=$mod->judul;?></h3>
	</div>
	<div class="panel-body">
	<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Detail</a></li>
	<li role="presentation"><a href="#soal" aria-controls="soal" role="tab" data-toggle="tab">Soal Latihan</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail">
			<br>
		<?php 
		echo '
					
					<form method="post" enctype="multipart/form-data">
					<div class="form-group"><label for="editor1">Judul Modul</label><input type="text" class="form-control" name="judul" value = "'.$mod->judul.'"></div>
					<div class="form-group"><label for="editor1">Youtube Video </label>
					<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item img-thumbnail" style="width:600px; height:400px;" src="//www.youtube.com/embed/'.$mod->video.'" frameborder="0" allowfullscreen></iframe>
					</div><br>
					<input type="text" class="form-control" name="youtube" value="'.$mod->video.'"></div>
					<div class="form-group"><label for="editor1">File</label></div>
					<div class="form-group"><blockquote>'.$mod->file.'</blockquote></div>
					
					<div class="form-group">
					<input type="file" class="form-control" name="file"  ></div>
					<input type="hidden" class="form-control" name="getfile" >
					<div class="form-group"><button type="submit" name="edit" class="btn btn-success">Edit</button></div>
					</form>
					';
					 
					if(isset($_POST['edit']))
					{
					$judul			=	$_POST['judul'];
					$video			=	$_POST['youtube'];
					$modfile		=	$_FILES['file']['name'];
					if(empty($modfile))
					{
						$filename	=	$mod->file;
					}
					else
					{
						$filename	=	$modfile;
					}
					$sql			= 	"update modul set judul = '$judul',file = '$filename', video = '$video' where id_modul = '$idmod'";
					$query			=	mysql_query($sql);
					$foldermod		=	"../modul/";
					if(!empty($modfile))
					{
					$delete_file	=	unlink("../modul/$mod->file");	
					$datamod	 	= 	$foldermod . basename($modfile);
					$move			= 	move_uploaded_file($_FILES['file']['tmp_name'], $datamod);						
					
					}				
					if($query OR $move)
					{
						
						echo '
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Modul sudah diubah</strong>
						</div>
						</div>
						<meta http-equiv="refresh" content= "1;URL=?edit-modul='.$mod->id_modul.'"/>
						';
						
					}
					}
		?>		
	
	</div>
		
    <div role="tabpanel" class="tab-pane" id="soal">
	<br>
					
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
	+ Tambahkan Soal
	</button>

<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-keyboard="false" data-backdrop="static">
	
	<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pertanyaan Baru</h4>
      </div>
	  <form method="post" action='' >
      <div class="modal-body">
	  <div class="form-group">
	  <label>Soal : </label>
      <!--<textarea class="ckeditor" cols="80" id="editor1" name="soal" rows="10" required></textarea>-->
	  <textarea class="form-control" cols="80" id="editor1" name="soal" rows="10" required></textarea>
	  </div>
	  <div class="form-group">
	  <label>Pilihan Jawaban : </label>
	  <div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">A</span>
		<input type="text" class="form-control" name="p_a" required>
		</div>
	  <div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">B</span>
		<input type="text" class="form-control" name="p_b" required>
		</div>
		<div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">C</span>
		<input type="text" class="form-control" name="p_c" required>
		</div>
		<div class="input-group input-group-sm">
		<span class="input-group-addon" id="sizing-addon3">D</span>
		<input type="text" class="form-control" name="p_d" required>
		</div>
	  </div>
	  <div class="form-group">
	  <label>Kunci</label>
	  <select name='kunci' class="form-control" required>
	  <option value="A">A</option>
	  <option value="B">B</option>
	  <option value="A">C</option>
	  <option value="A">D</option>
	  </select>
	  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" id='simpan' name='simpan'>Simpan</button>
      </div>
	  </form>
	  <?php
	  if(isset($_POST['simpan']))
	  {
		$soal 	= mysql_escape_string($_POST['soal']);
		$pa   	= mysql_escape_string($_POST['p_a']);
		$pb   	= mysql_escape_string($_POST['p_b']);
		$pc   	= mysql_escape_string($_POST['p_c']);
		$pd   	= mysql_escape_string($_POST['p_d']);
		$kunci	=   $_POST['kunci'];
		$querysoal			=	mysql_query("select no from soal_modul where id_modul = '$idmod'");
		$querynosoal	=	mysql_query("select max(no) as no from soal_modul where id_modul = '$idmod'");
		$getnosoal 		= mysql_fetch_object($querynosoal);
		$nosoal 		= $getnosoal->no;
		$maximalsoal 	= mysql_num_rows($querysoal);
		
		if($maximalsoal >= 5)
		{ 	echo "<script>alert('Soal sudah melebihi jumlah maksimal');window.location.href='?edit-modul=$idmod'</script></script>"; 
			die();
		}
		else
		{
		$nextno = $nosoal+1;
		$tgl = date('d-m-Y');
		$insert = mysql_query("insert into soal_modul value('','$idmod','$soal','$nextno','$pa','$pb','$pc','$pd','$kunci','$tgl')");
		if($insert)
		{
			echo '<script>alert("Soal sudah ditambahkan")</script>';
		}
	  }
	  }
	  ?>
    </div>
	</div>
	</div>				
					
	<hr>				
	<?php 
	$querysoal = mysql_query("select * from soal_modul where id_modul = '$idmod' order by no asc");
	$i = 1;
	while($getsoal = mysql_fetch_object($querysoal))
	{
		echo "<br>";
		echo "<div class='well'>";
		echo "<b>Soal no. $i:</b><br>";
		echo $getsoal->soal;
		echo "<p>";
		echo "A.".$getsoal->pa;
		echo "<br>";
		echo "B.".$getsoal->pb;
		echo "<br>";
		echo "C.".$getsoal->pc;
		echo "<br>";
		echo "D.".$getsoal->pd;
		echo "<br>";
		echo "Kunci : $getsoal->kunci<br>";
		echo "<br>";
		echo "<a href='?ubah-soal=$getsoal->id_soal_modul' class='btn btn-primary' >Ubah Pertanyaan</a>";
		echo "</div>";
		$i++;
	}
	
	?>
	
	</div>
	</div>
    
	</div>
	
    </div>
	</div>
	</div>	
		
		
		
		