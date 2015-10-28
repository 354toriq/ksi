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
    <title>Mata Pelajaran</title>
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
				if(isset($_GET['lihat-matpel']))
				{
					
				?>
				<script>$(document).ready( function () {
				$('#table_id').DataTable();
				} );</script>
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Data Mata Pelajaran</strong></div>
				<div class="panel-body">
				<div class="table-responsive">
				<div class="table-responsive">
					
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th width='150'>ID Matpel</th>
					<th>Nama</th>
					<th>Paket Belajar</th>
					<th>Jumlah Modul</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$sql				=	"select * from matpel where id_paket = '$siswa->id_paket'";
						$querymatpel		=	mysql_query($sql);
						
						while ($matpel		=	mysql_fetch_object($querymatpel))
						{		
								$idmatpel	=	$matpel->id_matpel;
								$idpaket	=	$matpel->id_paket;
								
								echo "<tr>";
								echo "<th>$matpel->id_matpel</th>";
								echo "<th>$matpel->nama</th>";
								$querypaket		= 	mysql_query("select * from paket where id_paket = '$idpaket'");
								$paket			=	mysql_fetch_object($querypaket);
								echo "<th>$paket->nama</th>";
								
								$querymod		= 	mysql_query("select * from modul where id_matpel = '$idmatpel'");
								$mod			=	mysql_num_rows($querymod);
								
								echo "<th>$mod</th>";
								
								echo "<th><a href='?detail=$idmatpel' class='btn btn-primary'>Detail</a>&nbsp;";
								echo "</th>"; 
								
								echo "</tr>";
								
						}
					
						
					
					?>
					</tbody>
					</table>
					</small>
					</div>
					</div>
					</div>
                    
					</div>
					<?php
					}
					?>
					
               
				<?php 
				if(isset($_GET['detail']))
				{
				include 'detail-matpel.php';
				}
				?>
				<?php 
				if(isset($_GET['soal-modul']))
				{
				include 'soal-modul.php';
				}
				?>
				<?php 
				if(isset($_GET['jawaban']))
				{
				include 'jawaban-soal.php';
				}

				?>
				<?php 
				if(isset($_GET['nilai-modul']))
				{
				include 'jawaban-soal.php';
				}

				?>
				<?php 
				if(isset($_GET['pelajari-modul']))
				{
				include 'pelajari-modul.php';
				}
				?>
				
          
                </section>
            </aside>
			
</body>
</html>