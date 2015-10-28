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
    <title>Data Nilai</title>
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
				if(isset($_GET['lihat-nilai']))
				{
					
				?>
				
				
				<script>$(document).ready( function () {
				$('#table_id').DataTable();
				} );</script>
			
				<div class="panel panel-primary">
				<div class="panel-heading"><strong>Data Nilai</strong></div>
				<div class="panel-body">
				<div class="table-responsive">
				<div class="table-responsive">
					<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#latihan" aria-controls="latihan" role="tab" data-toggle="tab">Latihan</a></li>
				<li role="presentation"><a href="#uas" aria-controls="uas" role="tab" data-toggle="tab">UAS</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="latihan">
				<br>
				<table id="table_id" class="display table-bordered">
				
					<thead>
					<tr>
					<th width='150'>ID Modul</th>
					<th>Modul </th>
					<th>Mata Pelajaran</th>
					<th>Nilai</th>
					<th width='150'>Detail</th>
					</tr>
					</thead>
					<tbody>
					<?php
						
						$querynilai		=	mysql_query("select * from nilai_soal where id_siswa = '$siswa->id_siswa' ");
						
						while ($nilai		=	mysql_fetch_object($querynilai))
						{		
								$idnilai	=	$nilai->id_nilai;
								
								echo "<tr>";
								echo "<th>$nilai->id_modul</th>";
								$querymodul = mysql_query("select * from modul where id_modul = '$nilai->id_modul'");
								$getmodul = mysql_fetch_object($querymodul);
								echo "<th>$getmodul->judul	</th>";
								
								$querymatpel 		= 	mysql_query("select * from matpel where id_matpel = '$getmodul->id_matpel' ");
								$matpel				=	mysql_fetch_object($querymatpel);
								
								echo "<th>$matpel->nama</th>";
								
								echo "<th>$nilai->nilai</th>";
								echo "<th><a href='data-matpel.php?nilai-modul=$getmodul->id_modul' class='btn btn-success'>Detail Nilai</th>";
								echo "</tr>";
								
						} 
					
						
					
					?>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="uas"></div>
				</div>
					
					</small>
					</div>
					</div>
					</div>
                    
					</div>
					
					<?php
					}
					?>
                </section>
            </aside>
			
</body>
</html>