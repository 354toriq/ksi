<?php 
	include 'include/cek_session.php'; 
	include 'include/database.php';
	include 'include/dependency.php';
	include 'include/script-dashboard.php';
	?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Siswa | Lowongan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    
	
</head>
      <body class="skin-black">
       
			<?php include 'include/header.php'; ?>

                 <aside class="right-side">

                <!-- Main content -->
                <section class="content">
				<?php
				if(isset($_GET['lihat-lowongan']))
				{
					
				?>
				<script>$(document).ready( function () {
				$('#table_id').DataTable();
				} );</script>
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Lowongan</strong></div>
				<div class="panel-body">
				<div class="table-responsive">
				<div class="table-responsive">
					
					<table id="table_id" class="display" border='0'>
					<thead>
					<tr>
					<th>ID</th>
					<th>Tipe</th>
					<th>Judul</th>
					<th>Posisi</th>
					<th>Employer</th>
					<th>Tgl.Posting</th>
					<th>Tgl.Tutup</th>
					<th width='200'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					
						$querylow		=	mysql_query("select * from lowongan where status = 'Terbit'");
						while ($low		=	mysql_fetch_object($querylow))
						{		
								$idlowongan	=	$low->id_lowongan;
								$idemp		=	$low->id_employer;
								echo "<tr>";
								echo "<th>$idlowongan</th>";
								$querykat		=	mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$low->id_kat_lowongan'");
								$getkat			=	mysql_fetch_object($querykat);
								echo "<th>$getkat->nama</th>";
								echo "<th>$low->judul</th>";
								echo "<th>$low->posisi</th>";
								$queryemp		= 	mysql_query("select * from employer where id_employer = '$idemp'");
								$emp			=	mysql_fetch_object($queryemp);
								$querypsh		= 	mysql_query("select * from perusahaan where id_perusahaan = '$emp->id_perusahaan'");
								$psh			=	mysql_fetch_object($querypsh);
								
								
								echo "<th>$psh->nama_perusahaan - $emp->nama</th>";
								
								/*$querymod		= 	mysql_query("select * from modul where id_matpel = '$idmatpel'");
								$mod			=	mysql_num_rows($querymod);*/
								
								echo "<th>$low->tgl_posting</th>";
								echo "<th>$low->tgl_tutup</th>";
								echo "<th><a href='?detail-lowongan=$idlowongan' class='btn btn-primary'>Detail</a>&nbsp;";
								
								echo "</tr>";
								
						}
					
						
				}
				?>
			
				<?php
				if(isset($_GET['detail-lowongan']))
				{
				include 'detail-lowongan.php';
				}
				
				
				?>
          
                </section>
            </aside>
			
</body>
</html>