	<?php
	$idemp			=	$_GET['edit-employer'];	
	$sql			=	"select * from employer,perusahaan where  employer.id_perusahaan = perusahaan.id_perusahaan and employer.id_employer = '$idemp'";
	$query 			= 	mysql_query($sql);
	$get			=	mysql_fetch_object($query);
	//echo $sql;
	//echo $sql;
	?>
	<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title">Detail Employer</h3>
	</div>
	<div class="panel-body">
					<br>
					<div class="row">
						<form action="" method='post' enctype="multipart/form-data" >
						<div class='col-md-6'>
						<fieldset>
						<div class="form-group">
						<label>Nama</label>
							<input class="form-control" placeholder="Nama Panjang  ...  " type="text" name='nama' required value='<?=$get->nama;?>'>
						</div>
						<div class="form-group">
						<label>Jenis Kelamin</label>
						<div class="radio radio-primary">
							<label>
							<input type="radio" name="kelamin" id="optionsRadios1" value="Pria" <?php if($get->jnsklmn == "Pria") { echo "checked";}?>><span class="circle"></span><span class="check"></span>
							Pria
							</label>
                        </div>
                            <div class="radio radio-primary">
                            <label>
                            <input type="radio" name="kelamin" id="optionsRadios2" value="Wanita" <?php if($get->jnsklmn == "Wanita") { echo "checked";}?>><span class="circle"></span><span class="check"></span>
							Wanita
                            </label>
                        </div>
						</div>
						<div class="form-group">
						<label>Tanggal Lahir</label>
						<div class="input-group date form_date "  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						<input class="form-control" type="text" name="tgllahir" placeholder='Tgl Lahir' value='<?=$get->tgllhr;?>'>
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
						<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" placeholder="Alamat"><?=$get->alamat;?></textarea>
						</div>
						<div class="form-group">
						<label>Kontak</label>
						<input class="form-control" placeholder="Telp.   " type="number" name='kontak' value='<?=$get->telp;?>' required>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						<label>Pendidikan Akhir</label>
						<select name='pendidikan' class="form-control">
						<option value='<?=$get->pendidikan;?>'><?=$get->pendidikan;?></option>
						<option>---------------------</option>
						<option value="SD">SD</option>
						<option value="SMP">SMP</option>
						<option value="SMA">SMA</option>
						<option value="Perguruan Tinggi">Perguruan Tinggi</option>
						</select>
						</div>
						<div class="form-group">
						<label>Jenjang Pendidikan</label>
						<input class="form-control"  type="text"   name='jenjang' placeholder="Nama Sekolah / Universitas - Kelas / Jurusan" value='<?=$get->jenjang;?>'>
						</div>
						<div class="form-group">
						<label>Email</label>
						<input class="form-control"  type="email"  name='email'  placeholder="email@email.com" value='<?=$get->email;?>'>
						</div>
						<div class="form-group">
						<label>Password</label>
						<input class="form-control"  type="text"  name='password'  placeholder="Password" value='<?=$get->password;?>'>
						</div>
						<div class="form-group">
						<label for="gambar">Foto</label>
						<input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload">
						<br>
						<div class="row col-sm-12">	
						<img src="../img/profil-employer/<?php if(empty($get->foto)) { echo "nodoc.jpg";} else { echo $get->foto; }?>" id="gambar_nodin" style="width: 250px; height:300px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
						<output id="gambar_nodin"></output>
						<input type="file" name="img_ijazah" id="preview_gambar" class="btn btn-info" value="<?=$sis->foto_ijasah?>"/>
						
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
						</div>
							<hr>
						
						<div class="col-md-6">
						<div class="form-group">
						<!--<select name="perusahaan" class="form-control">
							<option value='1'>Sudah ada</option>
							<option value='2'>Buat Baru</option>
						</select>-->
						<div class="radio radio-primary">
                            <label>
                            <input type="radio"  name='perusahaan' value='1' data-id="last" id="optionsRadios1"><span class="circle"></span>
							Perusahaan Sudah Ada
                            </label>
                        </div>
						<div class="radio radio-primary">
							<label>
							<input type="radio" name='perusahaan' value='2' data-id="new" id="optionsRadios1" /><span class="circle"></span>
							Perusahaan Baru
							</label>
                        </div> 
                        
						</div>						
						</div>			
						
						<hr />
						<div class="col-md-12">
						<div id="last" class="none">
						<div class='col-md-6'>
						<div class="form-group">
						<label>Nama Perusahaan</label>
						<input class="form-control" placeholder="Nama Perusahaan" type="text" name="nama_perusahaan" >
						</div>
						<div class="form-group">
						<label>Negara</label>
						<input class="form-control" placeholder="Negara" type="text" name="negara_perusahaan" >
						</div>
						<div class="form-group">
						<label>Provinsi</label>
						<input class="form-control" placeholder="Provinsi" type="text" name="prov_perusahaan" >
						</div>
						<div class="form-group">
						<label>Email Perusahaan</label>
						<input class="form-control" placeholder="Email Perusahaan" type="email" name="email_perusahaan">
						</div>
						
						</div>
						<div class="col-md-6">
						<div class="form-group">
						<label>Kontak Perusahaan</label>
						<input class="form-control" placeholder="Kontak Perusahaan" type="number" name="kontak_perusahaan">
						</div>
						<div class="form-group">
						<label>Alamat Perusahaan</label>
						<textarea class='form-control' name="alamat_perusahaan" row='3'></textarea>
						</div>
						<div class="form-group">
						<label>Jabatan di Perusahaan</label>
						<input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan">
						</div>
						<div class="form-group">
						<label>Website Perusahaan</label>
						<input class="form-control" placeholder="Website" type="text" name="web_perusahaan">
						</div>
						
						<div class="form-group">
						<label>Deskripsi Perusahaan</label>
						<textarea class='form-control' name="deskp_perusahaan" row='3'></textarea>
						</div>
						
						</div>
						</div>
						<div id="new" class="none">
						<div class="col-md-12">
						<div class="form-group">
						<label>Nama Perusahaan</label>
						<select class="form-control" name="perusahaan-ada">
						
						<?php 
						$querypshada 	=	mysql_query("select * from perusahaan");
						while ($pshada 	=	mysql_fetch_object($querypshada))
						{
							echo "<option value='$pshada->id_perusahaan'>$pshada->nama_perusahaan - $pshada->provinsi_perusahaan</option>";
						}	
						?>
						</select>
						</div>
						<div class="form-group">
						<label>Jabatan di Perusahaan</label>
						<input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan">
						</div>
						</div>
						</div>
						</div>
						<script>
						$(':radio').change(function (event) {
						var id = $(this).data('id');
						$('#' + id).addClass('none').siblings().removeClass('none');
						});						
						</script>
						<style>
						.none {
						display:none;
						}
						</style>
						
						
						<div class="col-md-12">
						<br>
						<button class="btn btn-success btn-lg" name='btn-simpan'>&nbsp;Tambah Employer</button>
						</div>
						
						</form>
						<?php
						if(isset($_POST['btn-simpan']))
						{
						$sql		=	mysql_query("select max(id_employer) as id from `employer`");
						$data		=	mysql_fetch_array($sql);
						$kodeawal	=	substr($data['id'],6,4);//ambil string mulai dari karakter ke 10 sampe 8 digit ke belakang
						$tambahkode	=	$kodeawal+1; //string yang sdh diambil ditambah1
						$awal		=	'EMP';
						$date		=	date("y");
						if($tambahkode<10)
						{	
						$kode		=	$awal.$date.'0000'; // mencetak komponen id terdiri dari idsekolah+$date+"0000"
						$kodejadi 	=	$kode.$tambahkode; //kode hasil 
						}
						elseif($tambahkode<100)
						{
						$kode		=	$awal.$date.'000';
						$kodejadi 	=	$kode.$tambahkode;
						}
						elseif($tambahkode<1000)
						{
						$kode		=	$awal.$date.'00';
						$kodejadi 	=	$kode.$tambahkode;
						}
						else
						{
						$kode		=	$awal.$date."0";
						$kodejadi 	=	$kode.$tambahkode;
						}
						$idemp		=	$kodejadi;
						$nama		=	mysql_escape_string($_POST['nama']);
						$kelamin	=	$_POST['kelamin'];
						$tgllahir	=	$_POST['tgllahir'];
						$gambar 	= 	$_FILES['Filegambar']['name'];
						$pdkn 		=	$_POST['pendidikan'];
						$jenjang 	=	$_POST['jenjang'];
						$email 		=	$_POST['email'];
						$kontak 	=	$_POST['kontak'];
						$password 	=	mysql_escape_string($_POST['password']);
						$alamat  	=	mysql_escape_string($_POST['alamat']);
						$psh		=	$_POST['perusahaan'];
						$gambar 	=	$_FILES['Filegambar']['name'];
						$sizefoto	=	$_FILES['Filegambar']['size'];
		
						$maxsize		=	2000000;
						if(($sizefoto >= $maxsize) || ($sizefoto == 0)) {
							
						echo "<script>alert('File Gambar harus kurang dari 2 MB, ukuran sekarang $sizefoto');</script>";
						die();
						}
						
						$getidpsh	=	$_POST['perusahaan-ada'];	
						$jb_p		=	$_POST['jabatan_perusahaan'];
						$nm_p		=	$_POST['nama_perusahaan'];
						$ngr_p		=	$_POST['negara_perusahaan'];
						$prv_p		=	$_POST['prov_perusahaan'];
						$em_p		=	$_POST['email_perusahaan'];
						$ktk_p		=	$_POST['kontak_perusahaan'];
						$web_p		=	$_POST['web_perusahaan'];
						$almt_p		=	mysql_escape_string($_POST['alamat_perusahaan']);
						$desk_p		=	mysql_escape_string($_POST['deskp_perusahaan']);
						if($psh		==	"1")
						{
						$tambah		=	"INSERT INTO employer values ('$idemp','$getidpsh','$nama','$kelamin','$tgllahir','$alamat','$gambar','$pdkn','$jenjang','$password','$email','$kontak','$jb_p')";	
						$query		=	mysql_query($tambah);
						}
						elseif($psh		==	"2")
						{
						$tambahpshbaru	=	"INSERT INTO perusahaan values('','$nm_p','$ngr_p','$prv_p','$em_p','$ktk_p','$almt_p','$web_p','$desk_p','')";
						$querypsh		=	mysql_query($tambahpshbaru);
						$selpsh			=	mysql_query("select * from perusahaan order by 'id_perusahaan' desc");
						$getpsh			=	mysql_fetch_object($selpsh);
						$getidpsh		=	$getpsh->id_perusahaan;
						$tambah			=	"INSERT INTO employer values ('$idemp','$getidpsh','$nama','$kelamin','$tgllahir','$alamat','$gambar','$pdkn','$jenjang','$password','$email','$kontak','$jb_p')";
						$query			=	mysql_query($tambah);
						
						}
						
						
						if($query)
						{
							
							echo 
							'
							<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Employer berhasil ditambahkan !
							</div>
							<meta http-equiv="refresh" content= "1;URL=?employer"/> 
							';
							
						}
						else
						{
							echo $tambah;
						}
						
					}
					
				
				?>
					</tbody>
					</table>
					</div>
					</div>		
					</div>
		