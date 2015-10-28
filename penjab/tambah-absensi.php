<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>	
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Mata Absensi</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Judul Absensi</label><input type="text" class="form-control" name="judul" required ></div>
			<div class="form-group"><label for="editor1">Tanggal Mulai Absensi</label>
			
			<div class="input-group date form_date col-md-5"  data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" type="text" name="tgl_mulai" placeholder='Tgl Mulai Absensi'>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
			</div>
			
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
			</script>
			
			<div class="form-group"><label for="editor1">Tanggal Berakhir Absensi</label>
			
			<div class="input-group date form_date2 col-md-5"  data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" type="text" name="tgl_akhir" placeholder='Tgl Berakhir Absensi'>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
			</div>
			<script type="text/javascript">
			$('.form_date2').datetimepicker({
				language:  'id',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
				});
			</script>
			<div class="form-group"><label for='alamat'>Keterangan</label><br><textarea class="form-control" id="alamat" name="ket" rows="10"></textarea></div>
	</div>		
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info"> <a href="?lihat-absensi" class="btn btn-warning">Kembali</a>
	</div>
    </div>
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		
		
		$judul			=	$_POST['judul'];
		$tgl_mulai		=	$_POST['tgl_mulai'];
		$tgl_akhir		=	$_POST['tgl_akhir'];
		$ket			=	mysql_escape_string($_POST['ket']);
		$isi			=	"INSERT INTO absensi VALUES('','$sekolah->id_sekolah','$judul','$tgl_mulai','$tgl_akhir','$ket')";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Absensi sudah ditambahkan
		</div>
		<meta http-equiv="refresh" content= "1;URL=?lihat-absensi"/>
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
		
		
		