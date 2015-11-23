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
        <title>Employer | Detail Lowongan</title>
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
                if (isset($_GET['lihat-lowongan'])) {
                    ?>
                    <script>$(document).ready(function() {
                            $('#table_id').DataTable();
                        });</script>

                    <div class="panel panel-primary">
                        <div class="panel-heading"><strong>Lowongan yang saya posting</strong></div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <div class="table-responsive">

                                    <table id="table_id" class="display table-bordered">
                                        <thead>
                                            <tr>
                                                <th >ID</th>
                                                <th>Kategori</th>
                                                <th>Judul</th>
                                                <th>Posisi</th>
                                                <th>Pelamar</th>
                                                <th>Tgl Posting</th>
                                                <th>Tgl Ditutup</th>
                                                <th>Status</th>
                                                <th width='150'>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $querylow = mysql_query("select * from lowongan where id_employer = '$emp->id_employer'");
                                            while ($low = mysql_fetch_object($querylow)) {
                                                $idlowongan = $low->id_lowongan;
                                                $idemp = $low->id_employer;
                                                echo "<tr>";
                                                echo "<th>$idlowongan</th>";
                                                $querykat = mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$low->id_kat_lowongan'");
                                                $getkat = mysql_fetch_object($querykat);
                                                echo "<th>$getkat->nama</th>";
                                                echo "<th>$low->judul</th>";
                                                echo "<th>$low->posisi</th>";

                                                $querypelamar = mysql_query("select * from pelamar where id_lowongan = '$low->id_lowongan'");
                                                $jumlahpelamar = mysql_num_rows($querypelamar);
                                                echo "<th>$jumlahpelamar</th>";



                                                /* $querymod		= 	mysql_query("select * from modul where id_matpel = '$idmatpel'");
                                                  $mod			=	mysql_num_rows($querymod); */

                                                echo "<th>$low->tgl_posting</th>";
                                                echo "<th>$low->tgl_tutup</th>";
                                                echo "<th>";
                                                if ($low->status == "Terbit") {
                                                    echo "<span class='label label-success'>Terbit</span></th>";
                                                } elseif ($low->status == "Tahan") {
                                                    echo "<span class='label label-default'>Tahan</span>";
                                                } elseif ($low->status == "Ubah") {
                                                    echo "<span class='label label-default'>Ubah</span>";
                                                }
                                                echo "</th>";
                                                echo "<th><a href='?detail-lowongan=$idlowongan' class='btn btn-primary'>Detail</a>&nbsp;";
                                                echo "<a href='?hapus-lowongan=$idlowongan' ";
                                                ?>
                                                onclick='return confirm("Yakin menghapus data lowongan pekerjaan ini?")'
                                                <?php
                                                echo "class='btn btn-danger'>Hapus</a></th>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset($_GET['hapus-kat-lowongan'])) {
                                            $idkat = $_GET['hapus-kat-lowongan'];
                                            $queryhapus = mysql_query("DELETE FROM `kategori_lowongan` WHERE `id_kat_lowongan` = '$idkat';");
                                            if ($queryhapus) {
                                                echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Kategori berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "1;URL=?kategori-lowongan"/>
							';
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (isset($_GET['hapus-lowongan'])) {
                                            $idlow = $_GET['hapus-lowongan'];
                                            $queryhapus = mysql_query("DELETE FROM `lowongan` WHERE `id_lowongan` = '$idlow';");
                                            if ($queryhapus) {
                                                echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Lowongan berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "1;URL=?lihat-lowongan"/>
							';
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset($_GET['lowongan']) && isset($_GET['setujui-pelamar'])) {
                                            $idpelamar = $_GET['setujui-pelamar'];
                                            $idlowongan = $_GET['lowongan'];
                                            $datesql = mysql_query("select now() as datetime");
                                            $getdate = mysql_fetch_object($datesql);
                                            $tglupdate = $getdate->datetime;
                                            $sqlupdate = mysql_query("update pelamar set status = 'A',tgl_diperbarui = '$tglupdate' where id = '$idpelamar' and id_lowongan = '$idlowongan'");
                                            if ($sqlupdate) {
                                                echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Pelamar disetujui
							</div>
							<meta http-equiv="refresh" content= "1;URL=?detail-lowongan='.$idlowongan.'"/>
							';
                                            }
                                        }
                                        ?>
                                                <?php
                                        if (isset($_GET['lowongan']) && isset($_GET['tolak-pelamar'])) {
                                            $idpelamar = $_GET['tolak-pelamar'];
                                            $idlowongan = $_GET['lowongan'];
                                            $datesql = mysql_query("select now() as datetime");
                                            $getdate = mysql_fetch_object($datesql);
                                            $tglupdate = $getdate->datetime;
                                            $sqlupdate = mysql_query("update pelamar set status = 'R',tgl_diperbarui = '$tglupdate' where id = '$idpelamar' and id_lowongan = '$idlowongan'");
                                            if ($sqlupdate) {
                                                echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Pelamar ditolak
							</div>
							<meta http-equiv="refresh" content= "1;URL=?detail-lowongan='.$idlowongan.'"/>
							';
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (isset($_GET['tambah-lowongan'])) {
                                            include 'tambah-lowongan.php';
                                        }
                                        if (isset($_GET['detail-lowongan'])) {
                                            include 'detail-lowongan.php';
                                        }
                                        if (isset($_GET['kategori-lowongan']) or isset($_GET['edit-kategori-lowongan'])) {
                                            include 'kategori-lowongan.php';
                                        }
                                        if (isset($_GET['employer']) or isset($_GET['edit-employer']) or isset($_GET['hapus-employer'])) {
                                            include 'employer.php';
                                        }
                                        if (isset($_GET['tambah-employer'])) {
                                            include 'tambah-employer.php';
                                        }
                                        /* if(isset($_GET['edit-employer']))
                                          {
                                          //echo '<meta http-equiv="refresh" content= "1;URL=detail-employer.php">';
                                          require_once 'detail-employer.php';

                                          }
                                         */
                                        ?>

                                        </section>
                                        </aside>

                                        </body>
                                        </html>
