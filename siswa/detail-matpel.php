	<?php
	include 'include/dependency.php';
	$idmatpel		=	$_GET['detail'];	
	$query 			= 	mysql_query("select * from matpel where id_matpel = '$idmatpel'");
	$matpel			=	mysql_fetch_object($query);
	?>

	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title">Detail Mata Pelajaran </h3>
	</div>
	<div class="panel-body">
	<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#profil-matpel" aria-controls="profil-matpel" role="tab" data-toggle="tab">Mata Pelajaran</a></li>
    <li role="presentation"><a href="#modul-matpel" aria-controls="modul-matpel" role="tab" data-toggle="tab">Modul</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="profil-matpel">
			<br>
			<div class="form-group"><label for="editor1">ID Mata Pelajaran</label><input type="text" class="form-control" name="idmatpel" value="<?=$matpel->id_matpel?>" disabled></div>
			<div class="form-group"><label for="editor1">Nama Mata Pelajaran </label><input type="text" class="form-control" name="nama" value="<?=$matpel->nama?>" disabled></div>
			<div class="form-group"><label for="editor1">Paket Pembelajaran</label></div>
			<div class="form-group">
			<select name="idpaket" class="form-control" disabled>
			<?php 	
						$idpkt				=	$matpel->id_paket;
						$querypktnow 		= 	mysql_query("select * from paket where id_paket ='$idpkt' ");
						$pktnow				=	mysql_fetch_object($querypktnow);
						echo "<option value='$pktnow->id_paket'>$pktnow->nama</option>";
						echo "<option>--------------</option>";
						$querypkt			= 	mysql_query("select * from paket ");
						while($pkt			= 	mysql_fetch_object($querypkt))
						{
							echo "<option value='$pkt->id_paket'>$pkt->nama</option>";
							
						}
				?>
				
			</select>
			</div>
			<div class="form-group"><label for='alamat'>Keterangan</label><br><textarea disabled class="form-control" id="ket" name="ket" rows="10"><?=$matpel->keterangan?></textarea></div>
	
	
	
	<a href="?lihat-matpel" class="btn btn-warning">Kembali</a>
	
    
	</form>
	
	
</div>
		
    <div role="tabpanel" class="tab-pane" id="modul-matpel">
	<br>
					
					<br>
					<div class="table-responsive">
					<script>$(document).ready( function () {
					$('#table_id').DataTable();
					} );</script>
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th width='5'>ID Modul</th>
					<th width='50'>Judul Modul</th>
					
					<th>Tanggal Upload</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						
						$querymodul		=	mysql_query("select * from modul where id_matpel = '$idmatpel'");
						while ($mod		=	mysql_fetch_object($querymodul))
						{		
								$idmod	=	$mod->id_modul;
								
								echo "<tr>";
								echo "<th>$mod->id_modul</th>";
								echo "<th>$mod->judul</th>";
								
								echo "<th>$mod->tgl_upload</th>";
								echo "<th><a href='../modul/$mod->file' class='btn btn-success'>Unduh Modul </a>&nbsp;<a href='?pelajari-modul=$idmod' class='btn btn-primary'>Pelajari & Kerjakan Modul </a>";
								echo "</th>";
								
								echo "</tr>";
								
						}
					
						
					
					?>
					
					</tbody>
					</table>
					
					
					</div>
	</div>
    
	</div>
			
		</div>
		</div>
		
