	<?php
	$idpkt		=	$_GET['detail'];	
	$query 		= 	mysql_query("select * from paket where id_paket = '$idpkt'");
	$paket		=	mysql_fetch_object($query);
	?>
	<script type="text/javascript" src="datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datepicker/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Detail Paket</h3>
	</div>
	<div class="panel-body">
	


			<div class="form-group"><label for="editor1">ID Paket</label><input type="text" class="form-control" name="idpaket" value="<?=$paket->id_paket?>" disabled></div>
			<div class="form-group"><label for="editor1">Nama Paket</label><input type="text" class="form-control" name="nama" value="<?=$paket->nama?>" disabled></div>
			<div class="form-group"><label for='alamat'>Keterangan</label><br><textarea class="form-control" id="alamat" name="ket" rows="10" disabled><?=$paket->keterangan?></textarea></div>
			<div class="form-group"><label for='alamat'>Mata Pelajaran </label><br></div>
			<div class="form-group">
			<?php 
			$querymatpel	=	mysql_query("select * from matpel where id_paket = '$idpkt' ");
			while($matpel	=	mysql_fetch_object($querymatpel))
			{
				echo "<h2><span class='label label-primary'><strong>$matpel->nama</strong></span></h2>";
			}
			?>
			</div>
	</div>		
	<div class="panel-footer">
	
	<a href="?lihat-paket" class="btn btn-warning">Kembali</a>
	</div>
    </div>
	</form>
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		
		$id_pkt			=	$_POST['idpaket'];
		$nm_pkt			=	$_POST['nama'];
		$ket			=	mysql_escape_string($_POST['ket']);
		$isi			=	"update paket set nama='$nm_pkt',keterangan='$ket' where id_paket = '$id_pkt'";
		//echo $isi;
		$sqltambah		=	mysql_query($isi) or die(mysql_error());
		if($sqltambah) 
		{		
		?>
		<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Paket sudah diubah
		</div>
		<meta http-equiv="refresh" content= "1;URL=?lihat-paket"/>
		<?php
		}
		if(!$sqltambah)
		{
		echo '
		<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Paket gagal ditambahkan, periksa kembali
		</div>
		';	
		}
		} 
		
		
		?>
		</div>
		</div>
		
		
		
		
		
		