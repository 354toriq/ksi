	<?php
	$idsiswa	=	$_GET['detail'];	
	$query 		= 	mysql_query("select * from siswa where id_siswa = '$idsiswa'");
	$sis		=	mysql_fetch_object($query);
	?>
	<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Detail Siswa</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Nama</label><input type="text" class="form-control" name="nama_siswa" required value="<?=$sis->nama?>"></div>
			<div class="form-group"><label for="editor1">Jenis Kelamin </label>
			<div class="radio">
            <label>
            <input type="radio" name="jnsklmn" id="optionsRadios1" value="Pria" <?php if($sis->jnsklmn == "Pria"){ echo 'checked'; }?> >
             Pria
            </label>
            </div>
            <div class="radio">
            <label>
            <input type="radio" name="jnsklmn" id="optionsRadios2" value="Wanita" <?php if($sis->jnsklmn == "Wanita"){ echo 'checked'; }?>>
            Wanita
            </label>
            </div>
			</div>
			<div class="form-group"><label for="editor1">Tempat & Tanggal Lahir</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<input type="text" class="form-control" name="tmp_lhr" value="<?=$sis->tmp_lhr?>" >
			</div>
			<div class="col-md-6">
			<div class="input-group date form_date col-md-5"  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" type="text" name="tgl_lhr" value="<?=$sis->tgl_lhr?>">
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
			</div></div>
			</div>
			
			<div class="form-group">
			<label>Agama</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<select class="form-control" name="agama">
			<?php echo '<option value="'.$sis->agama.'">'.$sis->agama.'</option>' ?>
			<option><hr></option>
			<option value="Islam">Islam</option>
			<option value="Katolik">Katolik</option>
			<option value="Protestan">Protestan</option>
			<option value="Hindu">Hindu</option>
			<option value="Budha">Budha</option>
			<option value="Khonghucu">Khonghucu</option>
			</select>
			</div>
			</div>
			</div>
			
			<div class="form-group"><label for="editor1">Nama Ortu</label><input type="text" class="form-control" name="ortu" required value="<?=$sis->nama_ortu?>"></div>
			
			<div class="form-group">
			<label>Pendidikan Akhir</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-4">
			<select class="form-control" name="pdkn">
			<?php echo '<option value="'.$sis->pdkn.'">'.$sis->pdkn.'</option>' ?>
			<option><hr></option>
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			
			</select>
			</div>
            
			
			
			<div class="col-md-4">
			<input type="text" class="form-control" name="jenjang" value="<?=$sis->jenjang?>">
			</div>
			
			<div class="col-md-4">
			<input type="text" class="form-control" name="thn_lulus"  value="<?=$sis->thn_lulus?>">
			</div>
			
			</div>
			</div>
			
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
			<label for="gambar1">Bukti Ijazah Pendidikan Terakhir</label>
			<input type="text" class="form-control" name="no_ijazah" required value="<?=$sis->no_ijasah?>">
			
			<br>
			<img src="../img/ijazah/<?php if(empty($sis->foto_ijasah)) { echo "nodoc.jpg";} else { echo $sis->foto_ijasah; }?>" id="gambar_nodin" style="width: 250px; height:300px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
						<output id="gambar_nodin"></output>
						<input type="file" name="img_ijazah" id="preview_gambar" class="btn btn-info" value="<?=$sis->foto_ijasah?>"/>
						<br>
						<blockquote>File ijazah dengan size kurang dari 2 Mb</blockquote>
						<script>
						function bacaGambar(input) {
						if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) 
						{
						$('#gambar_nodin').attr('src', e.target.result);
							}
						reader.readAsDataURL(input.files[0]);
						}	
						}
						</script>
						<script>
						$("#preview_gambar").change(function(){
						bacaGambar(this);
						});
						</script> 
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			<label for="gambar2">Bukti SKHUN Pendidikan Terakhir</label>
			<input type="text" class="form-control" name="no_skhun" required value="<?=$sis->no_skhun?>">
			<br>
			
			<img src="../img/skhun/<?php if(empty($sis->foto_skhun)) { echo "nodoc.jpg";} else { echo $sis->foto_skhun; }?>" id="gambar_nodin2" style="width: 250px; height:300px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
						<output id="gambar_nodin2"></output>
						<input type="file" name="img_skhun" id="preview_gambar2" class="btn btn-info" value="<?=$sis->foto_skhun?>"/>
						<br> <blockquote>File SKHUN dengan size kurang dari 2 Mb</blockquote>
						<script>
						function bacaGambar2(input) {
						if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) 
						{
						$('#gambar_nodin2').attr('src', e.target.result);
							}
						reader.readAsDataURL(input.files[0]);
						}	
						}
						</script>
						<script>
						$("#preview_gambar2").change(function(){
						bacaGambar2(this);
						});
						</script>  
			</div>
			</div>
			</div>
			</div>
			
			
			<div class="form-group"><label for="editor1">Telp.</label><input type="text" class="form-control" name="telp" required value="<?=$sis->telp?>"></div>
			<div class="form-group"><label for="editor1">Provinsi</label><input type="text" class="form-control" name="prov" required value="<?=$sis->prov?>"></div>
			<div class="form-group"><label for="editor1">Kota </label><input type="text" class="form-control" name="kota" required value="<?=$sis->kota?>"></div>
			<div class="form-group"><label for='alamat'>Alamat Lengkap</label><br><textarea class="form-control" id="alamat" name="alamat" rows="10"><?=$sis->alamat?></textarea></div>
			
			<hr>
			
			<div class="form-group"><label for="editor1">Email </label><input type="email" class="form-control" name="email" required value="<?=$sis->email?>"></div>
			<div class="form-group"><label for="editor1">Password </label><input type="text" class="form-control" name="password" required value="<?=$sis->password?>"></div>
			<div class="form-group">
			<label for="editor1">PKBM </label>
			</div>
			
			<div class="form-group">
			<select name="idsekolah" class="form-control">
			
				<?php 	
						$idsklh				=	$sis->id_sekolah;
						$querysekolahnow 	= 	mysql_query("select * from sekolah where id_sekolah ='$idsklh' ");
						$sekolah			=	mysql_fetch_object($querysekolahnow);
						echo "<option value='$sekolah->id_sekolah'>$sekolah->id_sekolah - $sekolah->nama - $sekolah->prov , $sekolah->kota</option>";
						echo "<option>----------</option>";
						$querysekolah		= 	mysql_query("select * from sekolah ");
						while($sekolah2 		= mysql_fetch_object($querysekolah))
						{
							echo "<option value='$sekolah2->id_sekolah'>$sekolah2->id_sekolah - $sekolah2->nama - $sekolah2->prov , $sekolah2->kota</option>";
							
						}
				?>
				
			</select>
			</div>
			<div class="form-group">
			<label for="editor1">Paket Pembelajaran </label>
			</div>
			<div class="form-group">
			<select name="idpaket" class="form-control">
				<?php 	
						$idpaket			=	$sis->id_paket;
						$querypktnow 	= 	mysql_query("select * from paket where id_paket ='$idpaket'");
						$pktnow			=	mysql_fetch_object($querypktnow);
						echo "<option value='$pktnow->id_paket'>$pktnow->nama</option>";
						echo "<option>----------</option>";
						$querypkt 	= mysql_query("select * from paket");
						while($pkt 	= mysql_fetch_object($querypkt))
						{
							echo "<option value='$pkt->id_paket'>$pkt->nama</option>";
							
						}
				?>
				
			</select>
			</div>

			<div class="form-group">
			<label for="gambar2">Foto</label>
			<br>
			<img src="../img/profil/<?php if(empty($sis->foto)) { echo "noimg.jpg";} else { echo $sis->foto; }?>" id="gambar_nodin3" style="width: 250px; height:300px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
						<output id="gambar_nodin3"></output>
						<input type="file" name="foto" id="preview_gambar3" class="btn btn-info" value="<?=$sis->foto?>"/>'
						<br> <blockquote>File foto dengan size kurang dari 2 Mb</blockquote>
						<script>
						function bacaGambar3(input) {
						if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) 
						{
						$('#gambar_nodin3').attr('src', e.target.result);
							}
						reader.readAsDataURL(input.files[0]);
						}	
						}
						</script>
						<script>
						$("#preview_gambar3").change(function(){
						bacaGambar3(this);
						});
						</script>  
			</div>
			
            
			
	</div>		
	<div class="panel-footer">
	<input type="submit" name="ubah" value="Ubah Detail" class="btn btn-info">&nbsp;
	<a href="?lihat-siswa" class="btn btn-warning">Kembali</a>
	</form>
	</div>
    </div>
	
	
	
	<?php
	if(isset($_POST['ubah']))
	{
		$nm 		=	mysql_escape_string($_POST['nama_siswa']);
		$jnsklmn	=	$_POST['jnsklmn'];
		$tmp_lhr	=	$_POST['tmp_lhr'];		
		$tgl_lhr	=	$_POST['tgl_lhr'];		
		$agama		=	$_POST['agama'];		
		$ortu		=	$_POST['ortu'];
		$pdkn		=	$_POST['pdkn'];		
		$jenj		=	mysql_escape_string($_POST['jenjang']);		
		$thn_lulus	=	$_POST['thn_lulus'];	
		$no_ijazah	=	$_POST['no_ijazah'];		
		$no_skhun	=	$_POST['no_skhun'];		
		$foto		=	$_FILES['foto']['name'];		
		$img_ijazah	=	$_FILES['img_ijazah']['name'];		
		$img_skhun	=	$_FILES['img_skhun']['name'];
		$sizeskhun	=	$_FILES['img_skhun']['size'];
		$sizeijazah	=	$_FILES['img_ijazah']['size'];
		$sizefoto	=	$_FILES['foto']['size'];
		$maxsize	=	2000000;
		if(($sizeskhun >= $maxsize) AND  ($sizeijazah >= $maxsize) and ($sizefoto >= $maxsize)) {
        $errors[] = "File Gambar harus kurang dari 2 MB ukuran sekarang Ijazah -> $sizeijazah KB , SKHUN -> $sizeskhun KB , Foto -> $sizefoto KB";
		}
		elseif(($sizeskhun >= $maxsize)) {
        $errors[] = "File Gambar SKHUN harus kurang dari 2 MB, ukuran sekarang $sizeskhun";
		}
		elseif(($sizeijazah >= $maxsize)) {
        $errors[] = "File Gambar Ijazah harus kurang dari 2 MB ukuran sekarang $sizeijazah";
		}
		elseif(($sizefoto >= $maxsize)) {
        $errors[] = "File Gambar Foto harus kurang dari 2 MB ukuran sekarang $sizefoto";
		}

        foreach($errors as $error) {
            echo "<script>alert('$error');</script>";
			die(); //Ensure no more processing is done
        }
		if(empty($img_ijazah))
		{
		$img_ijazah	=	$sis->foto_ijasah;		
		}
		if(empty($img_skhun))
		{
		$img_skhun	=	$sis->foto_skhun;		
		}
		if(empty($foto))
		{
		$foto	=	$sis->foto;		
		}		
		
		$telp		=	$_POST['telp'];
		$prov		=	$_POST['prov'];
		$kota		=	$_POST['kota'];		
		$alamat		=	$_POST['alamat'];		
		$email		=	$_POST['email'];		
		$password	=	$_POST['password'];		
		$idsekolah	=	$_POST['idsekolah'];		
		$idpaket	=	$_POST['idpaket'];		
		
		$isi		=	"UPDATE `siswa` SET `id_sekolah` = '$idsekolah', `id_paket` = '$idpaket',`nama` = '$nm', `jnsklmn` = '$jnsklmn', `tmp_lhr` = '$tmp_lhr', `tgl_lhr` = '$tgl_lhr', `agama` = '$agama', `nama_ortu` = '$ortu', `pdkn` = '$pdkn', `jenjang` = '$jenj', `thn_lulus` = '$thn_lulus', `no_ijasah` = '$no_ijazah', `no_skhun` = '$no_skhun', `foto` = '$foto', `foto_ijasah` = '$img_ijazah', `foto_skhun` = '$img_skhun', `email` = '$email', `prov` = '$prov', `kota` = '$kota', `telp` = '$telp', `alamat` = '$alamat', `password` = '$password' WHERE `siswa`.`id_siswa` = '$idsiswa'";
		//echo $isi;
		
		
		$folderijazah	= "../img/ijazah/"; 
		$folderskhun	= "../img/skhun/"; 
		$folderfoto		= "../img/profil/";
		//echo "<br>$img_ijazah - $img_skhun - $foto";
		if($img_ijazah!=$sis->foto_ijasah)
		{
		$delete_ijazah	=	unlink('../img/ijazah/'.$sis->foto_ijasah.'');	
		$dataijazah 	= 	$folderijazah . basename($img_ijazah);
		$move_ijazah	= 	move_uploaded_file($_FILES['img_ijazah']['tmp_name'], $dataijazah);		
		}
		if($img_skhun!=$sis->foto_skhun)
		{
		$delete_skhun	=	unlink('../img/skhun/'.$sis->foto_skhun.'');	
		$dataskhun		= 	$folderskhun . basename($img_skhun);
		$move_skhun		= move_uploaded_file($_FILES['img_skhun']['tmp_name'], $dataskhun);		
		}
		if($foto!=$sis->foto)
		{
		$delete_foto	=	unlink('../img/profil/'.$sis->foto.'');	
		$datafoto	 	= 	$folderfoto . basename($foto);
		$move_foto		= 	move_uploaded_file($_FILES['foto']['tmp_name'], $datafoto);	
		}
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		
		if($sqltambah) 
		{
		
		?>
		<meta http-equiv="refresh" content= "1"/>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Siswa berhasil diubah.
		</div>
		
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
		
		
		