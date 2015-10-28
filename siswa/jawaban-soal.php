	<?php
	include 'include/dependency.php';	
	include 'include/database.php';	
	if(isset($_GET['nilai-modul']))
	{
		$idmodul = $_GET['nilai-modul'];
		?>
	<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title">Hasil Nilai</h3>
		</div>
		<div class="panel-body">
		<div class="col-md-6">
		<div class="col-md-6">
		
		<img src="../img/profil/<?=$siswa->foto?>" class="img" alt="User Image" width="500" height="300" >
		</div>
		<div class="col-md-6">
		
		<form class="form-horizontal" >
		
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">ID Siswa		</p></label>
		<p class="form-control-static"><?=$siswa->id_siswa?></p>
		</div>
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">Nama	Siswa 	</p></label>
		
		<p class="form-control-static"><?=$siswa->nama?></p>
		</div>
		
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">PKBM		</p></label>
		
		<p class="form-control-static"><?=$sekolah->nama?></p>
		
		</div>
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">Paket yang diambil 	</p></label>
		
		
		<p class="form-control-static"><?=$siswa->id_paket?></p>
		
		</div>
		
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">Modul Soal 		</p></label>
		
		<?php 
		$query = mysql_query("select * from modul where id_modul = '$idmodul'");
		$getmodul = mysql_fetch_object($query);
		?>
		<p class="form-control-static"><?=$getmodul->judul?></p>
		
		
		</div>
		</form>
		 
		<?php 
		$query = mysql_query("select * from nilai_soal where id_modul = '$idmodul' and id_siswa = '$siswa->id_siswa'" );
		$getnilai = mysql_fetch_object($query);
		?>
		</div>
		</div>
		<div class="col-md-6" align="right">
		<h3>Perolehan Nilai : </h3>
		<h2><span class="label label-primary" width = '100' >Benar : <?=$getnilai->benar?></span>
		<span class="label label-danger" width = '100'>Salah 	:  <?=$getnilai->salah?></span>
		<span class="label label-default" width = '100'>Kosong 	:  <?=$getnilai->kosong?></span></h2>
		<h1><strong><span class="label label-success" width = '100'>Nilai 	:  <?=$getnilai->nilai?></span></strong></h1>
		</div>
		</div>
		</div>
		
		
			
		<?php
	}
	else{
	   if(isset($_POST['selesai']))
	   {
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					$query	=	mysql_query("select * from soal_modul where id_soal_modul='$nomor' and kunci='$jawaban'");
					$modul  = mysql_fetch_object($query);
					$cek	=	mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				$score = $benar*20;
				
			}
		$select = mysql_query("select * from nilai_soal where id_modul = '$modul->id_modul' and id_siswa = '$siswa->id_siswa'");
		//echo $select;
		if($select)
		{ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Nilai untuk soal modul ini telah masuk sebelumnya</strong>
			</div>
		<?php }
		else {
		$date 		= 	date('Y-m-d H:i:s');
		$sqlinsert 	=	 "insert into nilai_soal values('','$modul->id_modul','$siswa->id_siswa','$score','$salah','$benar','$kosong','$date')";
		$query = mysql_query($sqlinsert);
		
		?>
        
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title">Hasil Nilai</h3>
		</div>
		<div class="panel-body">
		<div class="col-md-6">
		<div class="col-md-6">
		
		<img src="../img/profil/<?=$siswa->foto?>" class="img" alt="User Image" width="500" height="300" >
		</div>
		<div class="col-md-6">
		
		<form class="form-horizontal" >
		
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">ID Siswa		</p></label>
		<p class="form-control-static"><?=$siswa->id_siswa?></p>
		</div>
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">Nama	Siswa 	</p></label>
		
		<p class="form-control-static"><?=$siswa->nama?></p>
		</div>
		
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">PKBM		</p></label>
		
		<p class="form-control-static"><?=$sekolah->nama?></p>
		
		</div>
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">Paket yang diambil 	</p></label>
		
		
		<p class="form-control-static"><?=$siswa->id_paket?></p>
		
		</div>
		
		<div class="form-group">
		<label class="col-sm-6 control-label"><p class="text-left">Modul Soal 		</p></label>
		
		<?php 
		$query = mysql_query("select * from modul where id_modul = '$modul->id_modul'");
		$getmodul = mysql_fetch_object($query);
		?>
		<p class="form-control-static"><?=$getmodul->judul?></p>
		
		
		</div>
		
		
		</form>
		 
		
		</div>
		</div>
		<div class="col-md-6" align="right">
		<h3>Perolehan Nilai : </h3>
		<h2><span class="label label-primary" width = '100' >Benar : <?=$benar?></span>
		<span class="label label-danger" width = '100'>Salah 	:  <?=$salah?></span>
		<span class="label label-default" width = '100'>Kosong 	:  <?=$kosong?></span></h2>
		<h1><strong><span class="label label-success" width = '100'>Nilai 	:  <?=$score?></span></strong></h1>
		</div>
		</div>
		</div>
		
		
        <?php 
	} } }
		?>



