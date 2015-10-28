<?php 
	include 'include/cek_session.php'; 
	include 'include/database.php';
	include 'include/script-dashboard.php';
	include 'include/dependency.php';
	
	?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employer | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    
	
</head>
      <body class="skin-black">
       
       <?php include 'include/header.php'; ?>
                 <aside class="right-side">
                <section class="content">
                    
					<div class="row">
					<div class="col-md-12">
					<div class="sm-st st-violet">
					<center><h2><font color="white">Selamat Datang Di Halaman Employer</font></h2></center>
					</div>
					</div>
					
                    <div class="col-md-12">
					
					<div class="sm-st st-green">
					<font color="white">
					<div class="row">
					<div class="col-md-8">
					
					<h3>
					<p><span class="fa fa-user" aria-hidden="true"></span>&nbsp;&nbsp;<?=$emp->id_employer?> - <?=$emp->nama?>
					<p><span class="fa fa-location-arrow" aria-hidden="true"></span>&nbsp;&nbsp;<?=$emp->alamat?>
					<p><span class="fa fa-phone-square" aria-hidden="true"></span>&nbsp;&nbsp;<?=$emp->telp?>
					<p><span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<?=$emp->email?>
					<p><span class="fa fa-briefcase" aria-hidden="true"></span>&nbsp;&nbsp;
					<?=$psh->nama_perusahaan?> - <?=$emp->jabatan?> - <?=$psh->provinsi_perusahaan?>
 					
					</h3>
					</font>
					</div>
					<div class="col-md-4 text-right">
					<img src="../img/profil-employer/<?php if(empty($emp->foto)) { echo "noimg.jpg";} else { echo $emp->foto; }?>" id="gambar_nodin3" style="width: 240px; height:240px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
					</div>
					</div>
					</div>
					
					</div>       
						
                    <!-- Main row -->
					<div class="col-md-6">
                           <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3><?php echo $countlowongan; ?></h3>
                                    <div>Lowongan</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
						</div>
                        </div>
                           <div class="col-md-6">
                           <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3><?php echo $countpelamar; ?></h3>
                                    <div>Pelamar</div>
                                </div>
                            </div>
                        </div>
                        <a href="data-matpel.php?lihat-matpel">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
						</div>
                        </div>
						 
						
						
						
						
					
                                        </section>


                      


                  </div>
				  </div>
				  </div>
				  </div>
                   
              <!-- row end -->
                </section><!-- /.content -->
                
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>