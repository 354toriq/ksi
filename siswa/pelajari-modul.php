	<?php
	include 'include/dependency.php';
	$idmodul		=	$_GET['pelajari-modul'];	
	$query 			= 	mysql_query("select * from modul where id_modul = '$idmodul'");
	$modul			=	mysql_fetch_object($query);
	?>

	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title"><?=$modul->judul?></h3>
	</div>
	<div class="panel-body">
	<div class="col-md-6">
	<div class="embed-responsive embed-responsive-16by9">
	<iframe src="http://localhost/ksi/modul/<?php echo $modul->file; ?>" style="width:600px; height:600px;" frameborder="0"></iframe>		
	</div>
	</div>
	<div class="col-md-6">
	<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item img-thumbnail" style="width:600px; height:600px;" src="//www.youtube.com/embed/<?=$modul->video?>" frameborder="0" allowfullscreen></iframe>
					</div>
	</div>
	</div>
	<div class="panel-footer">
	<a href="?detail=<?=$modul->id_matpel?>" class="btn btn-warning">Kembali</a>&nbsp;
	<?php 
        $ceksoalmodul = mysql_query("select * from soal_modul where id_modul = '$idmodul'");
        $jumlahsoalmodul = mysql_num_rows($ceksoalmodul);
        if($jumlahsoalmodul < 1)
        {
        ?>
        <button class="btn btn-danger" disabled>Soal Tidak Tersedia</button>
        <?php
        }
        else {
//        echo     "select * from nilai_soal where id_modul = '$idmodul' and id_siswa = '$siswa->id_siswa'";
	$nilai = mysql_query("select * from nilai_soal where id_modul = '$idmodul' and id_siswa = '$siswa->id_siswa'");
        $ceknilai = mysql_num_rows($nilai);
        $getnilai = mysql_fetch_object($nilai);
	if($ceknilai >= 1    ) {
		?>
	<a href="?nilai-modul=<?=$getnilai->id_nilai?>" class="btn btn-success">Lihat Nilai Modul Ini</a>
		<?php
	} else {
	?>
	<a href="?soal-modul=<?=$idmodul?>" class="btn btn-success">Latihan Soal</a>
        <?php } } ?>
	</div>
	</div>
		
