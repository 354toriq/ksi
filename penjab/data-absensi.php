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
    <title>Absensi</title>
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
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Data Absensi </strong></div>
				<div class="panel-body">
				<div class="table-responsive">
				<div class="table-responsive">
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th>#</th>
					<th>Judul Absensi</th>
					<th>Tgl Mulai</th>
					<th>Tgl Berakhir</th>
					<th>Hadir</th>
					<th>Absen</th>
					<th>Ijin</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					
						$queryabsensi			=	mysql_query("select * from absensi where id_sekolah = '$sekolah->id_sekolah'");
						$countabsensi			=	mysql_num_rows($queryabsensi);
						for($i = 1; $i <=$countabsensi; $i++){
						while ($absensi			=	mysql_fetch_object($queryabsensi))
						{		
								$idabsensi		=	$absensi->id_absensi;
								$hadir			=	mysql_num_rows(mysql_query("Select * from detail_absensi where id_absensi = '$idabsensi' and status = 'H'"));
								$ijin			=	mysql_num_rows(mysql_query("Select * from detail_absensi where id_absensi = '$idabsensi' and status = 'I'"));
								$noabsen		=	mysql_num_rows(mysql_query("Select * from detail_absensi where id_absensi = '$idabsensi' and status = 'A'"));
								echo "<tr>";
								echo "<th>$i</th>";
								echo "<th>$absensi->judul</th>";
								echo "<th>$absensi->tgl_mulai</th>";
								echo "<th>$absensi->tgl_akhir</th>";
								echo "<th>$hadir</th>";
								echo "<th>$noabsen</th>";
								echo "<th>$ijin</th>";
								echo "<th><a href='?detail=$idabsensi' class='btn btn-primary'>Detail</a></th>";
								echo "</tr>";
								
						$i++;
						} 
						}
						
					
					?>
					</tbody>
					</table>
					</div>
					</div>
					</div>
                    
					</div>
					<?php
					}
					?>
					<?php
					if(isset($_GET['hapus']))
					{
						$idsekolah		=	$_GET['hapus'];
						$queryhapus		=	mysql_query("DELETE FROM `pkbmksi`.`sekolah` WHERE `sekolah`.`id_sekolah` = '$idsekolah';");
						if($queryhapus)
						{
							echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Sekolah berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "2;URL=?lihat-sekolah"/>
							';
							
						}
					}
					?>
                   <?php 
				if(isset($_GET['tambah-absensi']))
				{
				include 'tambah-absensi.php';
				}
				?>
				<?php 
				if(isset($_GET['detail']))
				{
				include 'detail-absensi.php';
				}
				?>
          
                </section>
            </aside><!-- /.right-side -->

</body>
</html>


