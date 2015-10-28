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
    <title>	Sekolah</title>
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
				if(isset($_GET['lihat-sekolah']))
				{
					
				?>
				<script>$(document).ready( function () {
				$('#table_id').DataTable();
				} );</script>
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Data Sekolah </strong></div>
				<div class="panel-body">
				<div class="table-responsive">
				<div class="table-responsive">
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th>ID Sekolah</th>
					<th>Nama</th>
					<th>Penanggung Jawab</th>
					<th>Kota</th>
					<th>Jumlah Siswa</th>
					<th>Telp. </th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					
						$querysekolah			=	mysql_query("select * from sekolah");
						while ($sekolah			=	mysql_fetch_object($querysekolah))
						{		
								$idsekolah		=	$sekolah->id_sekolah;
								$idpenjab		=	$sekolah->id_penjab;
								echo "<tr>";
								echo "<th>$sekolah->id_sekolah</th>";
								echo "<th>$sekolah->nama</th>";
								$querypenjab 	= 	mysql_query("select * from penjab where id_penjab = '$idpenjab' ");
								$penjab			=	mysql_fetch_object($querypenjab);
								if(empty($penjab))
								{ echo "<th></th>";}
								else
								{
								echo "<th>$penjab->id_penjab - $penjab->nama</th>";
								}
								
								echo "<th>$sekolah->kota - $sekolah->prov</th>";
								$querysiswa 	= 	mysql_query("select * from siswa where id_sekolah = '$idsekolah' ");
								$siswa			=	mysql_num_rows($querysiswa);
								echo "<th>$siswa</th>";
								echo "<th>$sekolah->telp</th>";
								echo "<th><a href='?detail=$idsekolah' class='btn btn-primary'>Lihat Detail</a></th>";
								echo "</tr>";
								
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
				if(isset($_GET['tambah-sekolah']))
				{
				include 'tambah-sekolah.php';
				}
				?>
				<?php 
				if(isset($_GET['detail']))
				{
				include 'detail-sekolah.php';
				}
				?>
          
                </section>
            </aside><!-- /.right-side -->

</body>
</html>