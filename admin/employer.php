	<?php
	if(isset($_GET['edit-employer']))
	{ include 'detail-employer.php'; }
	else {			
	?>
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Employer</h3>
	</div>
	<div class="panel-body">
					<a href="?tambah-employer" class="btn btn-success btn-lg">Tambah Employer</a>
					<hr>
					<br>
					<div class="table-responsive">
					<script>$(document).ready( function () {
					$('#table_id').DataTable();
					} );</script>
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th width='150'>ID Employer</th>
					<th>Nama </th>
					<th>Perusahaan</th>
					<th>Jabatan</th>
					<th>Juml. Lowongan</th>
					<th>Email</th>
					<th>Kontak</th>
					<th>Status</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						
						$queryemp		=	mysql_query("select * from employer,perusahaan where employer.id_perusahaan = perusahaan.id_perusahaan ");
						while ($emp		=	mysql_fetch_array($queryemp))
						{		
															
								echo "<tr>";
								echo "<th>$emp[2]</th>";
								echo "<th>$emp[3]</th>";
								echo "<th>$emp[15]</th>";
								echo "<th>$emp[12]</th>";
								$querylow		=	mysql_query("select * from lowongan where id_employer = '$emp[0]'");
								$countlow		=	mysql_num_rows($querylow);
								
								echo "<th>$countlow</th>";
								echo "<th>$emp[10]</th>";
								echo "<th>$emp[11]</th>";
								if($emp[13] == "N")
								{
									
								echo "<th>None</th>";
								}
								else
								{
									echo "<th>Approve</th>";
								}	
								echo "<th><a href='?edit-employer=$emp[0]' class='btn btn-success'>Edit</a>&nbsp;";
								echo "<a href='?hapus-employer=$emp[0]'"; 
								?>
								onclick='return confirm("Yakin menghapus employer lowongan ini?")'
								<?php
								echo "class='btn btn-danger'>Hapus</a></th>";
								
								echo "</tr>";
								
						}
						if(isset($_GET['hapus-employer']))
						{
						$idemployer		=	$_GET['hapus-employer'];
						$queryhapus		=	mysql_query("DELETE FROM `employer` WHERE `id_employer` = '$idemployer';");
						if($queryhapus)
						{
							echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Employer berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "1;URL=?employer">
							';
							
						}
						}
						
	}
					?>
					
					
					</tbody>
					</table>
					
					
					</div>
	</div>
    
	</div>
		
		