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
    <title>Siswa | Absensi</title>
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
				if(isset($_GET['lihat-absensi']))
				{
					
				?>
				<script>$(document).ready( function () {
				$('#table_id').DataTable();
				} );</script>
			
				
				
					
				<?php		
				$queryabsensi		=	mysql_query("select * from absensi where id_sekolah = '$sekolah->id_sekolah'order by id_absensi desc");
				
				while ($abs			=	mysql_fetch_object($queryabsensi))
				{
					echo "
					<div class='col-md-3'>
					<form method='post'>
					<div class='panel panel-primary'>
					<div class='panel-heading'><strong>$abs->judul</strong></div>
					<div class='panel-body'>
					$abs->judul <br>
					Tgl Mulai : $abs->tgl_mulai<br>
					Tgl Berakhir : $abs->tgl_akhir<br>
					</div>
					<div class='panel-footer'>";
					$sqlcek = "select * from `detail_absensi` where id_absensi = '$abs->id_absensi' and id_siswa = '$siswa->id_siswa'";
					
					$cek = mysql_query($sqlcek);
					$countcek = mysql_num_rows($cek);
					
					if($countcek > 0) {
					echo "
					<a class='btn btn-warning btn-lg' disabled>Sudah Absen</a>
					</form>
					</div>
					</div></div>";
					}
					else{
						echo "
					<a href='?absen=$abs->id_absensi' class='btn btn-success btn-lg'>Absen</a>
					</form>
					</div>
					</div></div>";
					}
				}
				
				}
				?>
				<?php
				if(isset($_GET['absen']))
				{
						$idsiswa 	= $siswa->id_siswa;
						$idabsensi 	= $_GET['absen'];
						$status 	= 'H';
						$querytgl			=	mysql_query("select now() as tgl_now");
						$gettgl				=	mysql_fetch_object($querytgl);
						$tgl				= 	$gettgl->tgl_now;
						
						$sql 		= mysql_query("insert into detail_absensi values('','$idabsensi','$idsiswa','$status','$tgl')");
						if($sql) 
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
				}
				?>
				<?php
				if(isset($_GET['detail-absensi']))
				{
				include 'detail-absensi.php';
				}
				
				
				?>
          
                </section>
            </aside>
			
</body>
</html>