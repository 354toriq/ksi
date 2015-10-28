	<?php
	$idpenjab	=	$_GET['detail'];	
	$query 		= 	mysql_query("select * from penjab where id_penjab = '$idpenjab'");
	$penjab		=	mysql_fetch_object($query);
	?>
	<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Detail Penanggung Jawab</h3>
	</div>
	<div class="panel-body">
			<div class="form-group"><label for="editor1">ID Penjab</label><input type="text" class="form-control" name="nama_penjab" disabled value="<?=$penjab->id_penjab                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?>" ></div>
			<div class="form-group"><label for="editor1">Nama</label><input type="text" class="form-control" name="nama_penjab" disabled value="<?=$penjab->nama ?>" ></div>
			<div class="form-group"><label for="editor1">Jenis Kelamin </label>
			<div class="radio">
            <label>
            <input type="radio" name="jnsklmn" id="optionsRadios1" value="Pria" <?php if($penjab->jnsklmn == "Pria"){ echo 'checked'; }?> disabled>
             Pria
            </label>
            </div>
            <div class="radio">
            <label>
            <input type="radio" name="jnsklmn" id="optionsRadios2" value="Wanita" <?php if($penjab->jnsklmn == "Wanita"){ echo 'checked'; }?> disabled>
            Wanita
            </label>
            </div>
			</div>
			<div class="form-group"><label for="editor1">Tempat & Tanggal Lahir</label>
			</div>
			<div class="form-group">
			<div class="row">
			<div class="col-md-6">
			<input type="text" class="form-control" name="tmp_lhr" placeholder='Tempat Lahir' value="<?=$penjab->tmp_lhr ?>" disabled >
			</div>
			<div class="col-md-6">
			<div class="input-group date form_date col-md-5"  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" type="text" name="tgl_lhr" placeholder='Tgl Lahir' value="<?=$penjab->tgl_lhr ?>" disabled>
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
			<select class="form-control" name="pdkn" disabled>
			<?php  echo "<option value='$penjab->pdkn'>$penjab->pdkn</option>";?>
			<option ><hr></option>
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			<option value="SMA/SMK">SMA/SMK</option>
			<option value="Perguruan Tinggi">Perguruan Tinggi (D3/S1/S2)</option>
			</select>
			</div>
            
			<div class="col-md-6">
			<input type="text" class="form-control" name="jenjang"  placeholder = 'ex : SMAN 01 Batu' value="<?=$penjab->jenjang ?>" disabled>
			</div>
			</div>
			</div>
			
			<div class="form-group"><label for="editor1">Telp.</label><input type="number" class="form-control" name="telp" disabled  value="<?=$penjab->kontak ?>"></div>
			<div class="form-group"><label for="editor1">Provinsi</label><input type="text" class="form-control" name="prov" disabled  value="<?=$penjab->prov ?>"></div>
			<div class="form-group"><label for="editor1">Kota </label><input type="text" class="form-control" name="kota" disabled  ' value="<?=$penjab->kota  ?>"></div>
			<div class="form-group"><label for='alamat'>Alamat Lengkap</label><br><textarea class="form-control" id="alamat" name="alamat" rows="10" disabled><?=$penjab->alamat ?></textarea></div>
			
			<hr>
			
			<div class="form-group"><label for="editor1">Email </label><input type="email" class="form-control" name="email" disabled value="<?=$penjab->email ?>"></div>
			<div class="form-group"><label for="editor1">Password </label><input type="text" class="form-control" name="password" disabled value="<?=$penjab->password ?>"></div>
			<div class="form-group">
			<label for="gambar2">Foto</label>
			<br>
			<img src="../img/profil-penjab/<?php if(empty($penjab->foto)) { echo "noimg.jpg";} else { echo $penjab->foto; }?>" id="gambar_nodin3" style="width: 250px; height:300px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
						<output id="gambar_nodin3"></output>
						<input type="file" name="foto-penjab" id="preview_gambar3" class="btn btn-info" value="<?=$penjab->foto?>"/>
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
	<input type="submit" name="ubah" value="Ubah Detail" class="btn btn-info btn-lg">&nbsp;
	<button class="btn btn-success btn-lg">Cetak Detail</button>
	<a href="index.php" class="btn btn-success btn-warning btn-lg">Kembali</a>
	</div>
	</form>
    </div>
	
	
	
	<?php
	if(isset($_POST['ubah']))
	{
		
		$foto			=	$_FILES['foto-penjab']['name'];
		$sizefoto		=	$_FILES['foto-penjab']['size'];
		$maxsize		=	700000;
		if(($sizefoto >= $maxsize)) {
					
		echo "<script>alert('File Gambar harus kurang dari 700 KB, ukuran sekarang $sizefoto');</script>";
		die();
		}
		if(empty($foto))
		{
			$foto		=	$penjab->foto;
		}
		$isi			=	"UPDATE `penjab` SET `foto` = '$foto' WHERE `id_penjab` = '$idpenjab'";
		//echo $isi;
		if($foto		!=	$penjab->foto)
		{
		$folder			= 	"../img/profil-penjab/"; 
		$delete			=	unlink('../img/profil-penjab/'.$penjab->foto.'');	
		$data		 	= 	$folder . basename($foto);
		$move			= 	move_uploaded_file($_FILES['foto-penjab']['tmp_name'], $data);		
		}
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		
		
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Penanggung Jawab sukses diubah
		</div>
		<script>
		setTimeout(function(){location.href="data-penjab.php?detail=<?=$idpenjab?>"} , 4000);  
		</script>
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
		
		
		