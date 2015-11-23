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
					
						$querymatpel		=	mysql_query("select * from matpel");
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
					if(isset($_GET['hapus']))
					{
						$idmatpel		=	$_GET['hapus'];
						$queryhapus		=	mysql_query("DELETE FROM `pkbmksi`.`matpel` WHERE `matpel`.`id_matpel` = '$idmatpel';");
						if($queryhapus)
						{
							echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Mata pelajaran berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "1;URL=?lihat-matpel">
							';
							
						}
					}
					?>
                   <?php 
				if(isset($_GET['tambah-matpel']))
				{
				include 'tambah-matpel.php';
				}
				?>
				<?php 
				if(isset($_GET['detail']))
				{
				include 'detail-matpel.php';
				}
				?>
                                <?php 
				if(isset($_GET['pelajari-modul']))
				{
				include 'pelajari-modul.php';
				}
				?>
				<?php
					if(isset($_GET['hapus-modul']))
					{
						
						$id				=	$_GET['hapus-modul'];
						$sql			=	"DELETE FROM `pkbmksi`.`modul` WHERE `modul`.`id_modul` = '$id'";
						$queryhapus		=	mysql_query("DELETE FROM `pkbmksi`.`modul` WHERE `modul`.`id_modul` = '$id'");
						if($queryhapus)
						{
							echo '
							<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="glyphicon glyphicon-ok" aria-hidden="true">&times;</span></button>
							<strong>Modul sudah dihapus</strong>
							</div>
							<script>history.go(-1);</script>
							';
							
						}
						else
						{
							
							
						}
					}
					?>
					
					<?php
					if(isset($_GET['edit-modul']))
					{
					$idmod	=	$_GET['edit-modul'];
					$query	=	mysql_query("select * from modul where id_modul = '$idmod'");
					$mod	=	mysql_fetch_object($query);
					echo '
					<div class="well">
					<form method="post" enctype="multipart/form-data">
					<div class="form-group"><label for="editor1">Judul Modul</label><input type="text" class="form-control" name="judul" value = "'.$mod->judul.'"></div>
					<div class="form-group"><label for="editor1">File</label></div>
					<div class="form-group"><blockquote>'.$mod->file.'</blockquote></div>
					<div class="form-group">
					<input type="file" class="form-control" name="file"  ></div>
					<input type="hidden" class="form-control" name="getfile" ></div>
					<div class="form-group"><button type="submit" name="edit" class="btn btn-success">Edit</button></div>
					</form>
					';
					 
					if(isset($_POST['edit']))
					{
					$judul			=	$_POST['judul'];
					$modfile		=	$_FILES['file']['name'];
					if(empty($modfile))
					{
						$filename	=	$mod->file;
					}
					else
					{
						$filename	=	$modfile;
					}
					$sql			= 	"update modul set judul = '$judul',file = '$filename' where id_modul = '$idmod'";
					$query			=	mysql_query($sql);
					$foldermod		=	"../modul/";
					if(!empty($modfile))
					{
					$delete_file	=	unlink("../modul/$mod->file");	
					$datamod	 	= 	$foldermod . basename($modfile);
					$move			= 	move_uploaded_file($_FILES['file']['tmp_name'], $datamod);						
					
					}				
					if($query OR $move)
					{
						
						echo '
						<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Modul sudah ditambahkan</strong>
						</div>
						</div>
						<meta http-equiv="refresh" content= "1;URL=?detail='.$mod->id_matpel.'"/>
						';
						
					}
					}
					}
					?>
          
                </section>
            </aside>
			
</body>
</html>