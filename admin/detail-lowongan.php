	<?php
	$idlow			=	$_GET['detail-lowongan'];	
	$sql			=	"select * from lowongan,employer,perusahaan where lowongan.id_employer = employer.id_employer and employer.id_perusahaan = perusahaan.id_perusahaan and lowongan.id_lowongan = '$idlow'";
	$query 			= 	mysql_query($sql);
	$get			=	mysql_fetch_object($query);
	$querykat		=	mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$get->id_kat_lowongan'");
	$getkat			=	mysql_fetch_object($querykat);
	//echo $sql;
	?>
	
	<script src="../dependency/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Detail Lowongan</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="Emp">Employer</label>
			<select name="id_emp" class="form-control">
			<option value='<?=$get->id_employer;?>'><?=$get->nama_perusahaan;?> - <?=$get->nama;?></option>
			<option>--------------------</option>
			<?php 
				$queryemp	=	mysql_query("select * from employer,perusahaan where employer.id_perusahaan = perusahaan.id_perusahaan");
				while($getemp		=	mysql_fetch_object($queryemp))
				{	
				echo 	"<option value='$getemp->id_employer'>$getemp->nama_perusahaan - $getemp->nama </option>";
				}
			?>
			</select>
			</div>
			<div class="form-group"><label for="Emp">Kategori Lowongan</label>
			<select name="id_kat" class="form-control">
			<option value='<?=$getkat->id_kat_lowongan?>'><?=$getkat->nama?></option>
			<option>--------------------</option>
			<?php 
				$querykat	=	mysql_query("select * from kategori_lowongan");
				while($getkat		=	mysql_fetch_object($querykat))
				{	
				echo 	"<option value='$getkat->id_kat_lowongan'>$getkat->nama </option>";
				}
			?>
			</select>
			</div>
			<div class="form-group"><label for="lowongan">Judul Lowongan</label><input type="text" class="form-control" name="judul" required value='<?=$get->judul;?>'></div>
			<div class="form-group"><label for="lowongan">Posisi</label><input type="text" class="form-control" name="posisi"value='<?=$get->posisi;?>'></div>
			<div class="form-group"><label for='alamat'>Deksripsi Kebutuhan</label><br><textarea class="ckeditor" id="editor1" name="deskp" rows="10"" rows="10"><?=$get->deskripsi;?></textarea></div>
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
						<label>Tanggal Berakhir Lowongan</label>
						<div class="input-group date form_date"  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						
						<input class="form-control" type="text" name="dateclose" placeholder='Tgl Posting' value='<?=$get->tgl_posting;?>'>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
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
						</div>
			</div>	
			<div class="col-md-6">			
			<div class="form-group"><label for='alamat'>Status Lowongan</label><br>
			<select name="status" class="form-control" required>
			<option value='<?=$get->status;?>'><?=$get->status;?></option>
			<option>----------------</option>
			<option value="Terbit">Terbit</option>
			<option value="Tahan">Tahan</option>
			</select>
			</div>
			</div>
			</div>
	</div>		
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	<a href="?lihat-lowongan" class="btn btn-warning">Kembali</a>
	</div>
    </div>
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		$idkat			=	$_POST['id_kat'];
		$judul			=	mysql_escape_string($_POST['judul']);
		$posisi			=	mysql_escape_string($_POST['posisi']);
		$desk			=	mysql_escape_string($_POST['deskp']);
		$status			=	$_POST['status'];
		$dateclose		=	$_POST['dateclose'];
		$isi			=	"update lowongan set id_kat_lowongan = '$idkat',judul = '$judul',posisi = '$posisi', deskripsi = '$desk',tgl_tutup = '$dateclose',status = '$status' where id_lowongan = '$get->id_lowongan' ";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Lowongan sudah diubah
		</div>
		<meta http-equiv="refresh" content= "1;URL=?lihat-lowongan"/>
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
		
		