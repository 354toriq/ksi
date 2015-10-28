	<script type="text/javascript" src="datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Paket</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Nama Paket</label><input type="text" class="form-control" name="nama" required ></div>
			<div class="form-group"><label for='alamat'>Keterangan</label><br><textarea class="form-control" id="alamat" name="ket" rows="10"></textarea></div>
	</div>		
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	<a href="?lihat-paket" class="btn btn-warning">Kembali</a>
	</div>
    </div>
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		$query 		= "SELECT MAX(RIGHT(id_paket, 4)) as max_id FROM paket ORDER BY id_paket"; 
		$result 	= mysql_query($query); 
		$data 		= mysql_fetch_array($result); 
		$id_max 	= $data['max_id']; 
		$sort_num 	= (int) substr($id_max, 1, 4); 
		$sort_num++; 
		$gmx		=	"PK";
		$new_code 	= 	sprintf("%04s", $sort_num, $gmx); 
		$new_code_2	=	"$gmx$new_code";
		
		
		$id_pkt		=	$new_code_2;
		$nm_pkt			=	$_POST['nama'];
		$ket			=	mysql_escape_string($_POST['ket']);
		$isi			=	"INSERT INTO paket VALUES('$id_pkt','$nm_pkt','$ket')";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Paket sudah ditambahkan
		</div>
		<meta http-equiv="refresh" content= "1;URL=?lihat-paket"/>
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
		
		
		?>
		</div>
		
		