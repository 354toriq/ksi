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
        <title>Administrator | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">


    </head>
    <body class="skin-black">

        <?php include 'include/header.php'; ?>
        <aside class="right-side">
            <section class="content">


                <div class="sm-st">
                    <div class="row">
                        <div class="col-md-4" >

                            <center>
                                <img src="../img/profil/<?php
                                if (empty($siswa->foto)) {
                                    echo "noimg.jpg";
                                } else {
                                    echo $siswa->foto;
                                }
                                ?>" id="gambar_nodin3" style="width: 240px; height:240px;" alt="Preview Gambar" class="img-circle img-responsive"/>
                            </center>
                        </div  >
                        <div class="col-md-8">
                            <hr>
                            <h3><strong><b><?= $siswa->id_siswa ?> - <?= $siswa->nama ?></b></strong></h3>
                            <hr>
                            <p><span class="fa fa-university" aria-hidden="true"></span>&nbsp;&nbsp;<?= $sekolah->id_sekolah ?> - <?= $sekolah->nama ?>
                            <p><span class="fa fa-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?= $sekolah->telp ?>
                            <p><span class="fa fa-location-arrow" aria-hidden="true"></span>&nbsp;&nbsp;<?= $sekolah->Alamat ?> - <?= $sekolah->kota ?> - <?= $sekolah->prov ?>
                            <p><span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<?= $siswa->email ?>
                            <p><span class="    glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?= $siswa->telp ?>

                        </div>   
                    </div>
                </div>
                <div class="row">    
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cube fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h3><?php echo $countpaket; ?></h3>
                                        <div>Paket Kesetaraan</div>
                                    </div>
                                </div>
                            </div>
                            <a href="data-paket.php?lihat-paket">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Detail</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h3><?php echo $countmatpel; ?></h3>
                                        <div>Mata Pelajaran</div>
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
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-download fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h3><?php echo $countmodul; ?></h3>
                                        <div>Modul</div>
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

</body>
</html>