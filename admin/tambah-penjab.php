	<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Penanggung Jawab</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">Nama</label><input type="text" class="form-control" name="nama_penjab" required placeholder='Nama Panjang'></div>
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
			<label>Pendidikan Akhir</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<select class="form-control" name="pdkn">
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			<option value="SMA/SMK">SMA/SMK</option>
			<option value="Sarjana">Perguruan Tinggi (D3/S1/S2)</option>
			</select>
			</div>
            
			<div class="col-md-6">
			<input type="text" class="form-control" name="jenjang"  placeholder = 'ex : SMAN 01 Batu'>
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
			<label for="gambar2">Foto</label>
			<input type="file" class="btn btn-default" name="foto-penjab" id="filesToUpload3">
						<br> <blockquote>File foto dengan size kurang dari 700 kb</blockquote>
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
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">&nbsp;
	<a href="?lihat-penjab" class="btn btn-warning">Kembali</a>
	</form>
	</div>
    </div>
	
	
	
	<?php
	if(isset($_POST['simpan']))
	{
			$awal		=	'PJ';
			$sql1 		=	"select max(id_penjab) as id from penjab where id_penjab like '%$awal%'";
			$query		=	mysql_query($sql1);
			$data		=	mysql_fetch_array($query);
			$kodeawal	=	substr($data['id'],3,4);//ambil string mulai dari karakter ke 10 sampe 8 digit ke belakang
			$tambah		=	$kodeawal+1; //string yang sdh diambil ditambah1
			//$date		=	date("y");
			if($tambah<10)
			{
			$kode		=	$awal.'00';
			$kodejadi 	=	$kode.$tambah;
			}
			elseif($tambah<100)
			{
			$kode		=	$awal."0";
			$kodejadi 	=	$kode.$tambah;
			}
			elseif($tambah<1000)
			{
			$kode		=	$awal."0";
			$kodejadi 	=	$kode.$tambah;
			}
			//echo $sql1;
		//echo $kodejadi;
		$idpenjab		=	$kodejadi;
		$nm				=	$_POST['nama_penjab'];
		$jnsklmn		=	$_POST['jnsklmn'];
		$tgl_lhr		=	$_POST['tgl_lhr'];
		$tmp_lhr		=	$_POST['tmp_lhr'];
		$telp			=	$_POST['telp'];
		$pdkn			=	$_POST['pdkn'];
		$jenj			=	$_POST['jenjang'];
		$telp			=	$_POST['telp'];
		$prov			=	$_POST['prov'];
		$kota			=	$_POST['kota'];
		$alamat			=	mysql_escape_string($_POST['alamat']);
		$email			=	$_POST['email'];
		$password		=	$_POST['password'];
		$foto			=	$_FILES['foto-penjab']['name'];
		$sizefoto		=   $_FILES['foto-penjab']['size'];
		$maxsize		=	700000;
		if(($sizefoto >= $maxsize)) 
		{					
		echo "<script>alert('File Gambar harus kurang dari 700 KB, ukuran sekarang $sizefoto');</script>";
		die();
		}
		$isi			=	"INSERT INTO penjab VALUES('$idpenjab','$nm','$jnsklmn','$tmp_lhr','$tgl_lhr','$pdkn','$jenj','$telp','$prov','$kota','$alamat','$email','$password','$foto')";
		$folderfoto		= 	"../img/profil-penjab/"; 
		$datafoto	 	= 	$folderfoto . basename($foto);
		$move			= 	move_uploaded_file($_FILES['foto-penjab']['tmp_name'], $datafoto);
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah && $move) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Penanggung Jawab sukses ditambahkan
		</div>
		<meta http-equiv="refresh" content= "1;URL=?detail=<?=$kodejadi?>"/>
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
		
		
		