	<script type="text/javascript" src="datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Sekolah</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Nama PKBM</label><input type="text" class="form-control" name="nama_pkbm" required ></div>
			<div class="form-group"><label for="editor1">Penanggung Jawab </label></div>
			<div class="form-group">
			<select name="idpenjab" class="form-control">
				<?php 	$querypenjab 	= mysql_query("select * from penjab");
						while($penjab 	= mysql_fetch_object($querypenjab))
						{
							echo "<option value='$penjab->id_penjab'>$penjab->id_penjab - $penjab->nama - $penjab->kota,$penjab->prov</option>";
							
						}
				?>
				
			</select>
			</div>
			<div class="form-group"><label for="editor1">Provinsi</label><input type="text" class="form-control" name="prov_pkbm" required ></div>
			<div class="form-group"><label for="editor1">Kota</label><input type="text" class="form-control" name="kota_pkbm" required ></div>
			<div class="form-group"><label for="editor1">Tanggal Berdiri</label>
			<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" size="10" type="text" name="tgl_pkbm" >
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
			<input type="hidden" id="dtp_input2" value=""/>
			<script type="text/javascript">
			$('.form_date').datetimepicker({
				language:  'id',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
				});
			</script></div>
            
			<div class="form-group"><label for="editor1">Telp.</label><input type="text" class="form-control" name="telp" required ></div>
			
			<div class="form-group"><label for='alamat'>Alamat</label><br><textarea class="form-control" id="alamat" name="alamat" rows="10"></textarea></div>
	</div>		
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	</div>
    </div>
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		$query 		= "SELECT MAX(RIGHT(id_sekolah, 4)) as max_id FROM sekolah ORDER BY id_sekolah"; 
		$result 	= mysql_query($query); 
		$data 		= mysql_fetch_array($result); 
		$id_max 	= $data['max_id']; 
		$sort_num 	= (int) substr($id_max, 1, 4); 
		$sort_num++; 
		$gmx		=	"SKL";
		$new_code 	= 	sprintf("%04s", $sort_num, $gmx); 
		$new_code_2	=	"$gmx$new_code";
		
		
		$id_pkbm		=	$new_code_2;
		$nm_pkbm		=	$_POST['nama_pkbm'];
		$penjab			=	$_POST['idpenjab'];
		$prov			=	mysql_escape_string($_POST['prov_pkbm']);
		$kota			=	mysql_escape_string($_POST['kota_pkbm']);
		$tgl			=	$_POST['tgl_pkbm'];
		$telp			=	$_POST['telp'];
		$alamat			=	mysql_escape_string($_POST['alamat']);
		$isi			=	"INSERT INTO sekolah VALUES('$id_pkbm','$penjab','$nm_pkbm','$prov','$kota','$tgl','$alamat','$telp')";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Sekolah sukses ditambahkan
		</div>
		<meta http-equiv="refresh" content= "1;URL=?lihat-sekolah"/>
		<?php
		}
		if(!$sqltambah)
		{
		echo '
		<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Sekolah gagal ditambahkan, periksa kembali
		</div>
		';	
		}
		} 
		
		
		?>
		</div>
		
		