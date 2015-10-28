	<?php
	include 'include/dependency.php';
	$idmatpel		=	$_GET['detail'];	
	$query 			= 	mysql_query("select * from matpel where id_matpel = '$idmatpel'");
	$matpel			=	mysql_fetch_object($query);
	?>

	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title">Detail Mata Pelajaran </h3>
	</div>
	<div class="panel-body">
	<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#profil-matpel" aria-controls="profil-matpel" role="tab" data-toggle="tab">Mata Pelajaran</a></li>
    <li role="presentation"><a href="#modul-matpel" aria-controls="modul-matpel" role="tab" data-toggle="tab">Modul</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="profil-matpel">
			<br>
			<div class="form-group"><label for="editor1">ID Mata Pelajaran</label><input type="text" class="form-control" name="idmatpel" value="<?=$matpel->id_matpel?>"></div>
			<div class="form-group"><label for="editor1">Nama Mata Pelajaran </label><input type="text" class="form-control" name="nama" value="<?=$matpel->nama?>"></div>
			<div class="form-group"><label for="editor1">Paket Pembelajaran</label></div>
			<div class="form-group">
			<select name="idpaket" class="form-control">
			<?php 	
						$idpkt				=	$matpel->id_paket;
						$querypktnow 		= 	mysql_query("select * from paket where id_paket ='$idpkt' ");
						$pktnow				=	mysql_fetch_object($querypktnow);
						echo "<option value='$pktnow->id_paket'>$pktnow->nama</option>";
						echo "<option>--------------</option>";
						$querypkt			= 	mysql_query("select * from paket ");
						while($pkt			= 	mysql_fetch_object($querypkt))
						{
							echo "<option value='$pkt->id_paket'>$pkt->nama</option>";
							
						}
				?>
				
			</select>
			</div>
			<div class="form-group"><label for='alamat'>Keterangan</label><br><textarea class="form-control" id="ket" name="ket" rows="10"><?=$matpel->keterangan?></textarea></div>
	
	
	<input type="submit" name="simpan" value="Ubah" class="btn btn-info">&nbsp;
	<a href="?lihat-matpel" class="btn btn-warning">Kembali</a>
	
    
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		
		$id_matpel		=	$_POST['idmatpel'];
		$nm_matpel		=	$_POST['nama'];
		//	$ytb			=	$_POST['youtube'];
		$id_pkt			=	$_POST['idpaket'];
		$ket			=	mysql_escape_string($_POST['ket']);
		$isi			=	"update matpel set id_matpel = '$id_matpel',id_paket='$id_pkt',nama='$nm_matpel',keterangan='$ket' where id_matpel = '$idmatpel'";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Mata Pelajaran sudah diubah
		</div>
		<meta http-equiv="refresh" content= "1;URL=?lihat-matpel"/>
		<?php
		}
		if(!$sqltambah)
		{
		echo '
		<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Paket gagal ditambahkan, periksa kembali
		</div>
		';	
		}
		} 
		
		
		?></div>
		
    <div role="tabpanel" class="tab-pane" id="modul-matpel">
	<br>
					<form method="post" enctype="multipart/form-data">
					<div class="form-group"><label for="editor1">Judul Modul</label><input type="text" class="form-control" name="judul" required ></div>
					<div class="form-group"><label for="editor1">File Upload</label><input type="file" class="form-control" name="file" required ></div>
					* tipe modul harus .pdf<br><br>
					<div class="form-group"><label for="editor1">Youtube Video ID</label><input type="text" class="form-control" name="video" required ></div>
					<div class="form-group"><button type="submit" name="upload" class="btn btn-success">Upload</button></div>
					
					</form>
					<?php 
					if(isset($_POST['upload']))
					{
					$judul			=	$_POST['judul'];
					$ytb			=	$_POST['video'];
					$modfile		=	$_FILES['file']['name'];
					$ekstfile 		= 	$_FILES["file"]["type"];
					if($ekstfile != "application/pdf" )
					{
						echo '
						<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Modul harus berformat PDF</strong>
						</div>
						';	
						die();
					}
					$date			=	date('d/m/y');
					$sql			= 	"insert into modul values('','$idmatpel','$date','$judul','$modfile','$ytb')";
					$query			=	mysql_query($sql);
					$foldermod		=	"../modul/";
					$datamod	 	= 	$foldermod . basename($modfile);
					$move			= 	move_uploaded_file($_FILES['file']['tmp_name'], $datamod);						
					if($query && $move)
					{
						echo '
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Modul sudah ditambahkan</strong>
						</div>
						';	
					}
					}
					?>
					<hr>
					<br>
					<div class="table-responsive">
					<script>$(document).ready( function () {
					$('#table_id').DataTable();
					} );</script>
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th width='150'>ID Modul</th>
					<th>Judul Modul</th>
					<th>Youtube</th>
					<th>Tanggal Upload</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						
						$querymodul		=	mysql_query("select * from modul where id_matpel = '$idmatpel'");
						while ($mod		=	mysql_fetch_object($querymodul))
						{		
								$idmod	=	$mod->id_modul;
								
								echo "<tr>";
								echo "<th>$mod->id_modul</th>";
								echo "<th>$mod->judul</th>";
								echo "<th>$mod->video</th>";
								echo "<th>$mod->tgl_upload</th>";
								echo "<th><a href='../modul/$mod->file' class='btn btn-success'>Unduh</a>&nbsp;<a href='?edit-modul=$idmod' class='btn btn-primary'>Edit</a>&nbsp;";
								echo "<a href='?hapus-modul=$idmod'"; 
								?>
								onclick='return confirm("Yakin menghapus data mata pelajaran ini?")'
								<?php
								echo "class='btn btn-danger'>Hapus</a></th>";
								
								echo "</tr>";
								
						}
					
						
					
					?>
					
					</tbody>
					</table>
					
					
					</div>
	</div>
    
	</div>
			
		</div>
		</div>
		