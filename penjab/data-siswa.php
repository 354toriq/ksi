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
        <title>Siswa</title>
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
                if (isset($_GET['lihat-siswa'])) {
                    ?>
                    <script>$(document).ready(function() {
                            $('#table_id').DataTable();
                        });</script>

                    <div class="panel panel-primary">
                        <div class="panel-heading"><strong>Data Siswa </strong></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="table_id" class="display table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jn. Kelamin</th>
                                                <th>Paket Belajar</th>
                                                <th>Kota</th>
                                                <th>Email</th>
                                                <th>Telp. </th>
                                                <th width='150'>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $querysis = mysql_query("select * from siswa where id_sekolah = '$sekolah->id_sekolah'");
                                            while ($sis = mysql_fetch_object($querysis)) {
                                                $idsis = $sis->id_siswa;
                                                $idsklh = $sis->id_sekolah;
                                                $idpkt = $sis->id_paket;
                                                echo "<tr>";
                                                echo "<th>$sis->id_siswa</th>";
                                                echo "<th>$sis->nama</th>";
                                                echo "<th>$sis->jnsklmn</th>";

                                                $querypaket = mysql_query("select * from paket where id_paket = '$idpkt' ");
                                                $pkt = mysql_fetch_object($querypaket);
                                                echo "<th>$pkt->nama</th>";
                                                echo "<th>$sis->kota, $sis->prov</th>";
                                                echo "<th>$sis->email</th>";
                                                echo "<th>$sis->telp</th>";
                                                echo "<th><a href='?detail=$idsis' class='btn btn-primary'>Detail</a>&nbsp;";
                                                echo "<a href='?hapus=$idsis' ";
                                                ?>
                                                onclick='return confirm("Yakin menghapus data siswa ini?")'
                                                <?php
                                                echo "class='btn btn-danger'>Hapus</a></th>";
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
                if (isset($_GET['hapus'])) {
                    $idsiswa = $_GET['hapus'];
                    $queryhapus = mysql_query("DELETE FROM `siswa` WHERE `id_siswa` = '$idsiswa';");
                    if ($queryhapus) {
                        echo '
							<div class="alert alert-warning" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Siswa berhasil dihapus
							</div>
							<meta http-equiv="refresh" content= "1;URL=?lihat-siswa">
							';
                    }
                }
                ?>
                <?php
                if (isset($_GET['tambah-siswa'])) {
                    include 'tambah-siswa.php';
                }
                ?>
                <?php
                if (isset($_GET['detail'])) {
                    include 'detail-siswa.php';
                }
                ?>

            </section>
        </aside>

    </body>
</html>