<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Akun Administrator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <?php 
	include 'include/database.php';
	include 'include/dependency.php';
	include 'include/cek_session.php'; 
	
	
	?>
	
</head>
      <body class="skin-black">
       
       <?php include 'include/header.php'; ?>

                 <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    <form method="post" enctype="multipart/form-data">
					<div class="panel panel-primary">
					<div class="panel-heading">
					<h3 class="panel-title">Administrator</h3>
					</div>
					<div class="panel-body">
					<?php
					$query 		=	mysql_query("select * from admin");
					$get		=	mysql_fetch_object($query);
					?>	
					<input type="hidden" name="username_hid" value="<?php echo $get->username;?>">
					<div class="form-group">
					<label for="editor1">Username</label><input type="text" class="form-control" name="username" value="<?php echo $get->username;?>">
					</div>
					<div class="form-group">
					<label for="editor1">Password</label><input type="text" class="form-control" name="password" value="<?php echo $get->password;?>">
					</div>
					<div class="form-group">
					<label for="editor1">Nama</label><input type="text" class="form-control" name="name" value="<?php echo $get->nama;?>">
					</div>
					<div class="form-group">
					<label for="editor1">Email</label><input type="text" class="form-control" name="email" value="<?php echo $get->email;?>">
					</div>	
					<div class="form-group">
					<label for="editor1">Telp. </label><input type="text" class="form-control" name="kontak" value="<?php echo $get->kontak;?>">
					</div>
					</div>
					<div class="panel-footer">
					<input type="submit" name="ubah" value="Ubah" class="btn btn-success btn-lg">
					</div>
					</div>
					</form>
					
                    <?php
					if(isset($_POST['ubah']))
					{
					//$uh			=	$_POST['username_hid'];
					$u			=	$_POST['username'];
					$p 			=	mysql_escape_string($_POST['password']);
					$name		=	$_POST['name'];
					$email		=	$_POST['email'];
					$kon		=	$_POST['kontak'];
		
					$update		=	"Update admin set username = '$u' , password='$p' , nama = '$name' , email = '$email' , kontak = '$kon'";
					$runupdate	=	mysql_query($update)or die(mysql_error());
		
					if($runupdate) 
					{		
					?>
					<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="sr-only"></span>
					Data administrator sudah diubah
					</div>
					<meta http-equiv="refresh" content= "1;URL=admin.php"/>
					<?php
					}
					if(!$runupdate)
					{
					echo '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					<span class="sr-only"></span>
					Data administrator gagal diubah
					</div>
					';
					}
					} 
					?>                
                 </section>



                      


                  </div>
                   
              <!-- row end -->
                </section><!-- /.content -->
                
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        

       
</script>
</body>
</html>