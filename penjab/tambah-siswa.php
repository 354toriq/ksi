	<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Siswa</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Nama</label><input type="text" class="form-control" name="nama_siswa" required placeholder='Nama Panjang'></div>
			<div class="form-group"><label for="editor1">Jenis Kelamin </label>
			<div class="radio">
            <label>
            <input type="radio" name="jnsklmn" id="optionsRadios1" value="Pria" checked="">
             Pria
            </label>
            </div>
            <div class="radio">
            <label>
            <input type="radio" name="jnsklmn" id="optionsRadios2" value="Wanita">
            Wanita
            </label>
            </div>
			</div>
			<div class="form-group"><label for="editor1">Tempat & Tanggal Lahir</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<input type="text" class="form-control" name="tmp_lhr" placeholder='Tempat Lahir'>
			</div>
			<div class="col-md-6">
			<div class="input-group date form_date col-md-5"  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" type="text" name="tgl_lhr" placeholder='Tgl Lahir'>
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
			
			<div class="form-group"><label for="editor1">Nama Ortu</label><input type="text" class="form-control" name="ortu" required placeholder='Ibu/bapak'></div>
			
			<div class="form-group">
			<label>Pendidikan Akhir</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-4">
			<select class="form-control" name="pdkn">
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			
			</select>
			</div>
            
			
			
			<div class="col-md-4">
			<input type="text" class="form-control" name="jenjang"  placeholder = 'Nama Sekolah, contoh : SMPN 01 XXXX'>
			</div>
			
			<div class="col-md-4">
			<input type="text" class="form-control" name="thn_lulus"  placeholder = 'Tahun lulus, contoh : 2010'>
			</div>
			
			</div>
			</div>
			
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
			<label for="gambar1">Bukti Ijazah Pendidikan Terakhir</label>
			
			<input type="text" class="form-control" name="no_ijazah" required placeholder='No Ijazah '><br>
						<input type="file" class="btn btn-default" name="img_ijazah" id="filesToUpload1">
						<br>
						<div class="row col-sm-12">	
						<output id="filesInfo1"></output>
						</div>
						<script>
									function fileSelect(evt) {
									if (window.File && window.FileReader && window.FileList && window.Blob) {
									var files = evt.target.files;
									var divOne = document.getElementById('filesInfo1'); 
									var result = '';
									var file;
									for (var i = 0; file = files[i]; i++) {
									// if the file is not an image, continue
									if (!file.type.match('image.*')) {  continue;   }
									reader = new FileReader();
									reader.onload = (function (tFile) {
									return function (evt) {
									var div = document.createElement('div');
									divOne.innerHTML = '<img id="img_prev1" style="width: 300px; height:300px;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
									document.getElementById('filesInfo1').appendChild(div);
									};
									}(file));
									reader.readAsDataURL(file);
									}
									} else 
									{
									alert('The File APIs are not fully supported in this browser.');
									}
									}
									document.getElementById('filesToUpload1').addEventListener('change', fileSelect, false);
							</script>

							<script>
							$('input[type=file]').bootstrapFileInput();
							$('.file-inputs').bootstrapFileInput();
							</script>
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			<label for="gambar2">Bukti SKHUN Pendidikan Terakhir</label>
			<input type="text" class="form-control" name="no_skhun" required placeholder='No. SKHUN '>
			<br>
			<input type="file" class="btn btn-default" name="img_skhun" id="filesToUpload2">
						<br>
						<div class="row col-sm-12">	
						<output id="filesInfo2"></output>
						</div>
						<script>
									function fileSelect(evt) {
									if (window.File && window.FileReader && window.FileList && window.Blob) {
									var files = evt.target.files;
									var divOne = document.getElementById('filesInfo2'); 
									var result = '';
									var file;
									for (var i = 0; file = files[i]; i++) {
									// if the file is not an image, continue
									if (!file.type.match('image.*')) {  continue;   }
									reader = new FileReader();
									reader.onload = (function (tFile) {
									return function (evt) {
									var div = document.createElement('div');
									divOne.innerHTML = '<img id="img_prev2" style="width: 300px; height:300px;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
									document.getElementById('filesInfo2').appendChild(div);
									};
									}(file));
									reader.readAsDataURL(file);
									}
									} else 
									{
									alert('The File APIs are not fully supported in this browser.');
									}
									}
									document.getElementById('filesToUpload2').addEventListener('change', fileSelect, false);
							</script>

							<script>
							$('input[type=file]').bootstrapFileInput();
							$('.file-inputs').bootstrapFileInput();
							</script> 
			</div>
			</div>
			</div>
			</div>
			
			
			<div class="form-group"><label for="editor1">Telp.</label><input type="number" class="form-control" name="telp" required placeholder='Telp. '></div>
			<div class="form-group"><label for="editor1">Provinsi</label><input type="text" class="form-control" name="prov" required placeholder='Provinsi'></div>
			<div class="form-group"><label for="editor1">Kota </label><input type="text" class="form-control" name="kota" required placeholder='Kota '></div>
			<div class="form-group"><label for='alamat'>Alamat Lengkap</label><br><textarea class="form-control" id="alamat" name="alamat" rows="10"></textarea></div>
			
			<hr>
			
			<div class="form-group"><label for="editor1">Email </label><input type="email" class="form-control" name="email" required ></div>
			<div class="form-group"><label for="editor1">Password </label><input type="password" class="form-control" name="password" required ></div>
			
			<div class="form-group">
			<label for="editor1">Paket Pembelajaran </label>
			</div>
			<div class="form-group">
			<select name="idpaket" class="form-control">
				<?php 	$querypkt 	= mysql_query("select * from paket");
						while($pkt 	= mysql_fetch_object($querypkt))
						{
							echo "<option value='$pkt->id_paket'>$pkt->nama</option>";
							
						}
				?>
				
			</select>
			</div>
			<div class="form-group">
			<label for="gambar2">Foto</label>
			<input type="file" class="btn btn-default" name="foto" id="filesToUpload3">
						<br>
						<div class="row col-sm-12">	
						<output id="filesInfo3"></output>
						</div>
						<script>
									function fileSelect(evt) {
									if (window.File && window.FileReader && window.FileList && window.Blob) {
									var files = evt.target.files;
									var divOne = document.getElementById('filesInfo3'); 
									var result = '';
									var file;
									for (var i = 0; file = files[i]; i++) {
									// if the file is not an image, continue
									if (!file.type.match('image.*')) {  continue;   }
									reader = new FileReader();
									reader.onload = (function (tFile) {
									return function (evt) {
									var div = document.createElement('div');
									divOne.innerHTML = '<img id="img_prev3" style="width: 300px; height:300px;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
									document.getElementById('filesInfo3').appendChild(div);
									};
									}(file));
									reader.readAsDataURL(file);
									}
									} else 
									{
									alert('The File APIs are not fully supported in this browser.');
									}
									}
									document.getElementById('filesToUpload3').addEventListener('change', fileSelect, false);
							</script>

							<script>
							$('input[type=file]').bootstrapFileInput();
							$('.file-inputs').bootstrapFileInput();
							</script> 
			</div>
			
            
			
	</div>		
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	<a href="?lihat-siswa" class="btn btn-warning">Kembali</a>
	</form>
	</div>
    </div>
	
	
	
	<?php
	if(isset($_POST['simpan']))
	{
			$idsekolah	=	$sekolah->id_sekolah;
			$sql 		=	"select max(id_siswa) as id from siswa where id_sekolah like '%$idsekolah%' order by id_siswa asc";
			$query		=	mysql_query($sql);
			$data		=	mysql_fetch_array($query);
			$kodeawal	=	substr($data['id'],8,3);//ambil string mulai dari karakter ke 10 sampe 8 digit ke belakang
			$tambah		=	$kodeawal+1; //string yang sdh diambil ditambah1
			$date		=	date("y");
			if($tambah<10)
			{
			$kode		=	$idsekolah.$date."00";
			$kodejadi 	=	$kode.$tambah;
			}
			elseif($tambah<100)
			{
			$kode		=	$idsekolah.$date.'0';
			$kodejadi 	=	$kode.$tambah;
			}
			elseif($tambah<1000)
			{
			$kode		=	$idsekolah.$date."";
			$kodejadi 	=	$kode.$tambah;
			}
			
			//echo $kodejadi;
			
		$idsiswa	=	$kodejadi;
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
		$maxsize	=	700000;
		
		if(!empty($img_ijazah) or !empty($img_skhun) or !empty($foto)){
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
        } }
				
		$telp		=	$_POST['telp'];
		$prov		=	$_POST['prov'];
		$kota		=	$_POST['kota'];		
		$alamat		=	$_POST['alamat'];		
		$email		=	$_POST['email'];		
		$password	=	$_POST['password'];				
		$idpaket	=	$_POST['idpaket'];		
		$foto		=	$_FILES['foto']['name'];		
		$isi		=	"INSERT INTO siswa VALUES('$idsiswa','$idsekolah','$idpaket','$nm','$jnsklmn','$tmp_lhr','$tgl_lhr','$agama','$ortu','$pdkn','$jenj','$thn_lulus','$no_ijazah','$no_skhun','$foto','$img_ijazah','$img_skhun','$email','$prov','$kota','$telp','$alamat','$password')";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{
		$folderijazah	= "../img/ijazah/"; 
		$folderskhun	= "../img/skhun/"; 
		$folderfoto		= "../img/profil/"; 
		$dataijazah 	= $folderijazah . basename($img_ijazah);
		$dataskhun		= $folderskhun . basename($img_skhun);
		$datafoto	 	= $folderfoto . basename($foto);
		$move_ijazah	= move_uploaded_file($_FILES['img_ijazah']['tmp_name'], $dataijazah);		
		$move_skhun		= move_uploaded_file($_FILES['img_skhun']['tmp_name'], $dataskhun);		
		$move_foto		= move_uploaded_file($_FILES['foto']['tmp_name'], $datafoto);		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Siswa berhasil ditambahkan !
		</div>
		<meta http-equiv="refresh" content= "1;URL=?detail=<?=$idsiswa?>"/>
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
		
		
		