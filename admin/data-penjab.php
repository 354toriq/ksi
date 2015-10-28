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
    <title>Administrator | Penanggung Jawab</title>
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
				if(isset($_GET['lihat-penjab']))
				{
					
				?>
				<script>$(document).ready( function () {
				$('#table_id').DataTable({
					responsive: true
					
				});
				} );</script>
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Data Penjab (Penanggung Jawab Sekolah) </strong></div>
				<div class="panel-body">
				
					
					<table id="table_id" class="display table-bordered dt-responsive">
					<thead>
					<tr>
					<th>ID Penjab</th>
					<th>Nama Penjab</th>
					<th>Jn. Kelamin</th>
					<th>PKBM</th>
					<th>Kota</th>
					<th>Email</th>
					<th>Telp. </th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					
						$querypenjab		=	mysql_query("select * from penjab");
						while ($penjab		=	mysql_fetch_object($querypenjab))
						{		
								$idpenjab	=	$penjab->id_penjab;
								echo "<tr>";
								echo "<th>$penjab->id_penjab</th>";
								echo "<th>$penjab->nama</th>";
								echo "<th>$penjab->jnsklmn</th>";
								
								$querysekolah 		= 	mysql_query("select * from sekolah where id_penjab = '$idpenjab' ");
								$sekolah			=	mysql_fetch_object($querysekolah);
								if(empty($sekolah))
								{ echo "<th></th>";}
								else
								{
								echo "<th>$sekolah->nama - $sekolah->kota</th>";
								}
								echo "<th>$penjab->kota </th>";
								echo "<th>$penjab->email</th>";
								echo "<th>$penjab->kontak</th>";
								echo "<th><a href='?detail=$idpenjab' class='btn btn-primary'>Detail</a>&nbsp;";
								echo "<a href='?hapus=$idpenjab' "; 
								?>
								onclick='return confirm("Yakin menghapus data penjab ini?")'
								<?php
								echo "class='btn btn-danger'>Hapus</a></th>";
								echo "</tr>";
								
						}
					
						
					
					?>
					</tbody>
					</table>
					</small>
					</div>
					
                    
					</div>
					<?php
					}
					?>
					<?php
					if(isset($_GET['hapus']))
					{
						$idpenjab		=	$_GET['hapus'];
						$queryhapus		=	mysql_query("DELETE FROM `penjab` WHERE `id_penjab` = '$idpenjab';");
						if($queryhapus)
						{
							echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Penjab berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "1;URL=?lihat-penjab"/>
							';
							
						}
					}
					?>
                   <?php 
				if(isset($_GET['tambah-penjab']))
				{
				include 'tambah-penjab.php';
				}
				?>
				<?php 
				if(isset($_GET['detail']))
				{
				include 'detail-penjab.php';
				}
				?>
          
                </section>
            </aside>
			
</body>
</html>