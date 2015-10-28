<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Employer | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <?php 
	
	include 'include/dependency.php';

	?>
	
</head>
</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->



<br>
<br><br>
    <div class="container">
	<div class="col-md-4">
	<center><img src='img/key.png' class="img-responsive"></center>
	</div>
	<div class="col-md-8">
    <div class="panel panel-primary">
        <p class="panel-heading">Masuk sebagai employer</p>
        <div class="panel-body">
		<form  name="masuk_admin" action="include/proses-login.php" method="post">
                <div class="form-group">
                    <label>ID Employer</label>
                    <input type="text" class="form-control" name="tx_id" required autofocus placeholder="Masukkan ID ...  ">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" class="form-control" name="tx_pas" required placeholder="Masukkan Password ... ">
                </div>
				
				<a href="../index.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>
				<button type='submit' name='masuk' class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Masuk</button>
				<a href="daftar-employer.php" class="btn btn-danger btn-lg"><span class="fa fa-paper-plane"></span>&nbsp;Mendaftar</a>
                
				
            </form>
			</div>
        </div>
    </div>
    
    
</div>



    <script src="lib/bootstrap/js/bootstrap.js"></script>
   
  
</body></html>
