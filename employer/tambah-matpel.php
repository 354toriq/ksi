	
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Mata Pelajaran</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Nama Mata Pelajaran</label><input type="text" class="form-control" name="nama" required ></div>
			<div class="form-group"><label for="editor1">Paket Pembelajaran</label></div>
			<div class="form-group">
			<select name="idpaket" class="form-control">
				<?php 	$querypaket 	= mysql_query("select * from paket");
						while($paket 	= mysql_fetch_object($querypaket))
						{
							echo "<option value='$paket->id_paket'>$paket->nama</option>";
							
						}
				?>
				
			</select>
			</div>
			<div class="form-group"><label for='alamat'>Keterangan</label><br><textarea class="form-control" id="alamat" name="ket" rows="10"></textarea></div>
	</div>		
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	</div>
    </div>
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		$query 		= "SELECT MAX(RIGHT(id_matpel, 4)) as max_id FROM matpel ORDER BY id_matpel"; 
		$result 	= mysql_query($query); 
		$data 		= mysql_fetch_array($result); 
		$id_max 	= $data['max_id']; 
		$sort_num 	= (int) substr($id_max, 1, 4); 
		$sort_num++; 
		$gmx		=	"MP";
		$new_code 	= 	sprintf("%04s", $sort_num, $gmx); 
		$new_code_2	=	"$gmx$new_code";
		
		
		$idmatpel		=	$new_code_2;
		$idpaket		=	$_POST['idpaket'];
		$nm_matpel		=	$_POST['nama'];
		$ket			=	mysql_escape_string($_POST['ket']);
		$isi			=	"INSERT INTO matpel VALUES('$idmatpel','$idpaket','$nm_matpel','$ket')";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Mata pelajaran sudah ditambahkan
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
		Mata pelajaran gagal ditambahkan, periksa kembali
		</div>
		';	
		}
		} 
		
		
		?>
		</div>
		
		