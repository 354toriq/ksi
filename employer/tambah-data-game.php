<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Game</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <?php 
	include 'dependency.php';
	include 'include/cek_session.php'; 
	include 'include/script-dashboard.php';
	?>
	


	<script src="ckeditor/ckeditor.js"></script>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                GameOn
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="img/admin.png" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Administrator</p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                            
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li >
                                   <a href="index.php" >
                                       <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="active" data-popover="true" ><a href="#" data-target=".master-game" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-paper-plane"></i> Game<i class="fa fa-collapse"></i></a></li>
								<li><ul class="master-game nav nav-list collapsed">            
									<li ><a href="tambah-data-game.php">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah</a></li>
									<li class="active"><a href="data-game.php">&nbsp;&nbsp;<span class="fa fa-align-justify"></span>&nbsp;&nbsp;Lihat</a></li>
								</ul>
								</li>
                                <li data-popover="true" ><a href="#" data-target=".kategori" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-list-alt"></i> Kategori Game<i class="fa fa-collapse"></i></a></li>
								<li><ul class="kategori nav nav-list collapse">            
									<li ><a href="tambah-kat-game.php">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah </a></li>
									<li ><a href="data-kat-game.php">&nbsp;&nbsp;<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Lihat </a></li>
								</ul>
								</li>
								<li data-popover="true" ><a href="#" data-target=".dev" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-building"></i> Game Developer<i class="fa fa-collapse"></i></a></li>
								<li><ul class="dev nav nav-list collapse">            
									<li ><a href="tambah-dev-game.php">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah </a></li>
									<li ><a href="data-game-dev.php">&nbsp;&nbsp;<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Lihat </a></li>
								</ul>
								</li>
								<li data-popover="true" ><a href="#" data-target=".mem" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-users"></i> Member<i class="fa fa-collapse"></i></a></li>
								<li><ul class="mem nav nav-list collapse">            
									<li ><a href="tambah-data-mem.php">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah </a></li>
									<li ><a href="data-mem.php">&nbsp;&nbsp;<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Lihat </a></li>
								</ul>
								</li>
                                <li>
								<li data-popover="true" ><a href="#" data-target=".trans" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-shopping-cart"></i> Transaksi<i class="fa fa-collapse"></i></a></li>
								<li><ul class="trans nav nav-list collapse">            
									<li ><a href="data-transaksi.php">&nbsp;&nbsp;<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Lihat </a></li>
								</ul>
								</li>
								<li data-popover="true" ><a href="#" data-target=".artikel" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-newspaper-o"></i> Artikel<i class="fa fa-collapse"></i></a></li>
								<li><ul class="artikel nav nav-list collapse">            
									<li ><a href="tambah-data-artikel.php">&nbsp;&nbsp;<span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah </a></li>
									<li ><a href="data-artikel.php">&nbsp;&nbsp;<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Lihat </a></li>
								</ul>
								</li>
								<li>
                                    <a href="admin.php">
                                        <i class="fa fa-user"></i> <span>Akun Administrator</span>
                                    </a>
                                </li>
								<li>
                                    <a href="include/proses-logout.php">
                                        <i class="fa fa-sign-out"></i> <span>Keluar</span>
                                    </a>
                                </li>

							</ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                 <aside class="right-side">

                <!-- Main content -->
                <section class="content">
<?php
			
		mysql_connect("localhost","root","") or die("Gagal melakukan Koneksi!"); 
		mysql_select_db("game_sale") or die("Gagal memilih Database!"); 
		
		function autoNumber()
		{ 
		$query 		= "SELECT MAX(RIGHT(id_game, 4)) as max_id FROM mst_game ORDER BY id_game"; 
		$result 	= mysql_query($query); 
		$data 		= mysql_fetch_array($result); 
		$id_max 	= $data['max_id']; 
		$sort_num 	= (int) substr($id_max, 1, 4); 
		$sort_num++; 
		$gmx		=	"GM";
		$new_code 	= 	sprintf("%04s", $sort_num, $gmx); 
		$new_code_2	=	"$gmx$new_code";
		return $new_code_2;
		}
?>
	
	<form method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Game</h3>
	</div>
	<div class="panel-body">
    <div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#spesifikasi" data-toggle="tab">Spesifikasi</a></li>
        <li><a href="#gambar" data-toggle="tab">Gambar Cover</a></li>
		<!-- <li><a href="#gambar_screenshoot" data-toggle="tab">Gambar Screenshoot</a></li> -->
        <li><a href="#video" data-toggle="tab">Video Trailer</a></li>
		<li><a href="#deskripsi" data-toggle="tab">Deskripsi</a></li>
		<li><a href="#master_upload" data-toggle="tab">File Master</a></li>
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="spesifikasi">
            <form class="form-horizontal" role="form" name="form_tambah" id="form_tambah" method="post" action="" enctype="multipart/form-data">
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">ID Game</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control" name="tx_id_game" value="<?php echo autoNumber(); ?>" required>
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Judul Game</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control" name="tx_judul" required>
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Game Developer</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<select class="form-control input-md" name="game_dev" required>
			<?php
				require_once 		"../database/database.php";
				$select_kat			=	"SELECT * FROM `mst_game_dev`";
				$query_kat			=	mysql_query($select_kat);
				$numrowslihat_kat	= 	mysql_num_rows($query_kat);
				echo 				$numrowslihat_kat;

				$x=1;
				if($query_kat) 
				while ($hsl_kat= mysql_fetch_object($query_kat)) 
				{
				echo '<option value="'.$hsl_kat->id_game_dev.'" >'.$hsl_kat->nm_game_dev.'</option>';
				}			
			?>
			</select>
			</div>
			</div>
			</div>
	
			
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Kategori</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			
			<select class="form-control input-md" name="genre" required>
			<?php
				require_once 	"../database/database.php";
				$select_kat			=	"SELECT * FROM `mst_kategori`";
				$query_kat			=	mysql_query($select_kat);
				$numrowslihat_kat	= 	mysql_num_rows($query_kat);
				echo $numrowslihat_kat;
				$x=1;
				if($query_kat) 
				while ($hsl_kat= mysql_fetch_object($query_kat)) 
				{
					echo '<option value="'.$hsl_kat->id_kat.'" >'.$hsl_kat->nm_kat.'</option>';
				}
					
					
			?>
				
			</select>
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Processor</label>
			<div class="col-sm-10">
			<div class="input-group">
			<input type="text" class="form-control" name="tx_proc">
			<span class="input-group-addon">GHZ</span>
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Memory</label>
			<div class="col-sm-10">
			<div class="input-group">
			<input type="text" class="form-control" name="tx_mem">
			<span class="input-group-addon">GB</span>
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">VGA</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control"  name="tx_vga">
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Direct X</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control"  name="tx_drx">
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Hardisk</label>
			<div class="col-sm-10">
			<div class="input-group">
			<input type="text" class="form-control" name="tx_hd">
			<span class="input-group-addon">GB</span>
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Sistem Operasi</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control"  name="tx_os">
			</div>
			</div>
			</div>
	
			<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label">Harga</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control"  name="tx_harga" required>
			</div>
			</div>
			</div>
			
		</div>
        
		
		<div class="tab-pane" id="gambar">
			<br>
			<input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload">
			<br>
			<div class="row col-sm-12">	
			<output id="filesInfo"></output>
			</div>
				
		</div>
			<!--- Preview Gambar -->
		<script>
		function fileSelect(evt) {
		if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
		var divOne = document.getElementById('filesInfo'); 
        var result = '';
        var file;
        for (var i = 0; file = files[i]; i++) {
            // if the file is not an image, continue
            if (!file.type.match('image.*')) {  continue;   }
		
            reader = new FileReader();
            reader.onload = (function (tFile) {
                return function (evt) {
                    var div = document.createElement('div');
                    divOne.innerHTML = '<img id="img_prev" style="width: auto;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
                    document.getElementById('filesInfo').appendChild(div);
                };
            }(file));
            reader.readAsDataURL(file);
        }
		} else {
        alert('The File APIs are not fully supported in this browser.');
		}
		}
		document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
		</script>

		<script>
		$('input[type=file]').bootstrapFileInput();
		$('.file-inputs').bootstrapFileInput();
		</script>
		
		<div class="tab-pane" id="video">
			<div class="form-group form-group-sm">
			<label	class="col-sm-2 control-label">Video Youtube URL</label>
			<div class="col-sm-10">
			<div class="input-group-btn">
			<input type="text" class="form-control"  name="tx_id_ytb"> <h5>Contoh :  www.youtube.com/watch?v=<strong>OELJ8qZ8Fe8</strong></h5>
			</div>
			</div>
			</div>
		</div>
		
		<div class="tab-pane" id="deskripsi">
		
		<br>
		
		<textarea  rows="3" name="deskripsi" id='editor1' class="ckeditor"></textarea>
		
		</div>
		
		
		<div class="tab-pane" id="master_upload">
		
			<br>
			<input type="file" class="btn btn-default" name="file_master">
			<br>
		</div>
		
		</div>
	</div>
	</div>
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	</div>
    </div>
	</form>
 
	<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#tabs").tab();
    });
	</script>    

	
	
	<?php
	if(isset($_POST['simpan']))
	{
		
		$id					=	$_POST['tx_id_game'];
		$jdl				=	mysql_escape_string($_POST['tx_judul']);
		$gnr				=	$_POST['genre'];
		$gdv				=	$_POST['game_dev'];
		$proc				=	$_POST['tx_proc'];
		$mem				=	$_POST['tx_mem'];
		$dx					=	$_POST['tx_drx'];
		$hd					=	$_POST['tx_hd'];
		$os					=	$_POST['tx_os'];
		$hrg				=	$_POST['tx_harga'];
		$vga				=	$_POST['tx_vga'];
		$gmbr_tampil		=	$_FILES['Filegambar']['name'];
		$file_master		=	$_FILES['file_master']['name'];
		$video				=	$_POST['tx_id_ytb'];
		$desk				=	$_POST['deskripsi'];
		$isi				=	"INSERT INTO mst_game VALUES('$id','$jdl','$gnr','$gdv','$proc','$mem','$vga','$dx','$hd','$os','$hrg','$gmbr_tampil','$video','$desk','$file_master')";
		$sqltambah			=	mysql_query($isi) or die(mysql_error());
		$file_master_dir	=	"master-game/"; 
		$file_master_data 	= 	$file_master_dir . basename($file_master);
		$move_master		=	move_uploaded_file($_FILES['file_master']['tmp_name'], $file_master_data);
		$gambarfolder		=	"../game-gambar/"; 
		$gambar_data 		= 	$gambarfolder . basename($_FILES['Filegambar']['name']);
		$move_gambar		=	move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar_data);		
		if($sqltambah) 
		{		
		echo "<script type='text/javascript'>alert('Game Berhasil Ditambah'); window.location.href='tambah-data-game.php';</script>";
		}
		
		if(!$sqltambah)
		{
			echo '<script type="text/javascript"> 	alert("Data gagal disimpan");	</script>';
		}
		} 
		
	
		?>
		
		
      </section>
	  </aside>
	  </div>
</body>
</html>
