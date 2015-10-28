	

	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    
    <h3 class="panel-title">Kategori Lowongan </h3>
	</div>
	<div class="panel-body">
					<?php if(isset($_GET['edit-kategori-lowongan']))
					{
					$idkat		=	$_GET['edit-kategori-lowongan'];	
					$query		=	mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$idkat'");	
					$getkat		=	mysql_fetch_object($query);
					?>
					<form method="post" enctype="multipart/form-data">
					<div class="form-group"><label for="editor1">Nama Kategori</label><input type="text" class="form-control" name="nama" required value="<?=$getkat->nama?>"></div>
					
					<div class="form-group"><button type="submit" name="ubah" class="btn btn-success">Ubah</button></div>
					</form>
					<?php
					if(isset($_POST['ubah']))
					{
					$nama			=	$_POST['nama'];
					$sql			= 	"update `kategori_lowongan` set nama = '$nama' where id_kat_lowongan = '$idkat'";
					$query			=	mysql_query($sql);
					if($query)
					{
						echo '
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Kategori lowongan sudah diubah</strong>
						</div>
						<meta http-equiv="refresh" content= "1;URL=?kategori-lowongan"/>
						';
					
					}
					}
					}
					
					else
					{
					?>
					<form method="post" enctype="multipart/form-data">
					<div class="form-group"><label for="editor1">Nama Kategori</label><input type="text" class="form-control" name="nama" required></div>
					
					<div class="form-group"><button type="submit" name="tambah" class="btn btn-success">Tambah</button></div>
					</form>
					<?php
					if(isset($_POST['tambah']))
					{
					$nama			=	$_POST['nama'];
					$sql			= 	"insert into kategori_lowongan values('','$nama')";
					$query			=	mysql_query($sql);
					
					if($query)
					{
						echo '
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Kategori lowongan sudah ditambahkan</strong>
						</div>
						
						';
						
					}
					}
					}
					?>
					<hr>
					<br>
					<div class="table-responsive">
					<script>$(document).ready( function () {
					$('#table_id').DataTable();
					} );</script>
					<table id="table_id" class="display table-bordered">
					<thead>
					<tr>
					<th width='150'>ID Kategori</th>
					<th>Nama Kategori</th>
					<th>Jumlah Lowongan</th>
					<th width='150'>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						
						$querykatlowongan		=	mysql_query("select * from kategori_lowongan");
						while ($kat				=	mysql_fetch_object($querykatlowongan))
						{		
															
								echo "<tr>";
								echo "<th>$kat->id_kat_lowongan</th>";
								echo "<th>$kat->nama</th>";
								$querylow	=	mysql_query("select * from lowongan where id_kat_lowongan = '$kat->id_kat_lowongan'");
								$countlow	=	mysql_num_rows($querylow);
								
								echo "<th>$countlow</th>";
								echo "<th><a href='?edit-kategori-lowongan=$kat->id_kat_lowongan' class='btn btn-success'>Edit</a>&nbsp;";
								echo "<a href='?hapus-kat-lowongan=$kat->id_kat_lowongan'"; 
								?>
								onclick='return confirm("Yakin menghapus kategori lowongan ini?")'
								<?php
								echo "class='btn btn-danger'>Hapus</a></th>";
								
								echo "</tr>";
								
						}
					
						
					
					?>
					
					
					</tbody>
					</table>
					
					
					</div>
	</div>
    
	</div>
		