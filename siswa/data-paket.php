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
    <title>Paket Kesetaraan</title>
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
				if(isset($_GET['lihat-paket']))
				{
					
				?>
				<script>$(document).ready( function () {
				$('#table_id').DataTable();
				} );</script>
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Data Paket Kesetaraan</strong></div>
				<div class="panel-body">
				<div class="table-responsive">
				<div class="table-responsive">
					
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th width='150'>ID Paket Kesetaraan</th>
					<th>Nama</th>
					<th>Jumlah Mata Pelajaran</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					
						$querypaket		=	mysql_query("select * from paket where id_paket = '$siswa->id_paket'");
						while ($paket		=	mysql_fetch_object($querypaket))
						{		
								$idpaket	=	$paket->id_paket;
								
								echo "<tr>";
								echo "<th>$paket->id_paket</th>";
								echo "<th>$paket->nama</th>";
								
								$querymatpel 		= 	mysql_query("select * from matpel where id_paket = '$idpaket' ");
								$matpel				=	mysql_num_rows($querymatpel);
								
								echo "<th>$matpel</th>";
								echo "<th><a href='?detail=$idpaket' class='btn btn-primary'>Detail</a>&nbsp;";
								
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
				include 'detail-paket.php';
				}
				?>
          
                </section>
            </aside>
			
</body>
</html>