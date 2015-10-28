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
        <title>Penanggung Jawab | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">


    </head>
    <body class="skin-black">

        <?php include 'include/header.php'; ?>

        <aside class="right-side">

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-4">

                        <div class="sm-st">

                            <div class="row">
                                <center>
                                    <img src="../img/profil-penjab/<?php if (empty($penjab->foto)) {
            echo "noimg.jpg";
        } else {
            echo $penjab->foto;
        } ?>" id="gambar_nodin3" style="width: 200px; height:190px;" alt="Preview Gambar" class="img-circle img-responsive"/>


                                    <hr>
                                    <h3><strong><b><?= $penjab->id_penjab ?> - <?= $penjab->nama ?></b></strong></h3>
                                    <hr>
                                </center>
                            </div>


                            <p><span class="fa fa-university" aria-hidden="true"></span>&nbsp;&nbsp;<?= $sekolah->id_sekolah ?> - <?= $sekolah->nama ?></p>
                            <p><span class="fa fa-location-arrow" aria-hidden="true"></span>&nbsp;&nbsp;<?= $sekolah->Alamat ?> - <?= $sekolah->kota ?> - <?= $sekolah->prov ?></p>
                            <p><span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<?= $penjab->email ?></p>
                            <p><span class="fa fa-phone-square" aria-hidden="true"></span>&nbsp;&nbsp;<?= $sekolah->telp ?></p>
                            <p><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?= $penjab->kontak ?></p>



                        </div>
                    </div>



                    <div class="col-md-8">


                        <div class="sm-st st-green">
                            <center><h2><font color="white"><strong>Selamat Datang Di Halaman Penanggung Jawab</strong></font></h2></center>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3><?php echo $countsiswa; ?></h3>
                                                <div>Siswa</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="data-siswa.php?lihat-siswa">
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
                                                <i class="fa fa-cube fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3><?php echo $countpaket; ?></h3>
                                                <div><small>Paket Kesetaraan</small></div>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-book fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3><?php echo $countmatpel; ?></h3>
                                                <div><small>Mata Pelajaran</small></div>
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

                            <div class="col-md-6">
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
                    </div>
                </div>


                <!-- row end -->
            </section><!-- /.content -->

        </aside><!-- /.right-side -->


    </body>
</html>