<?php
include 'include/dependency.php';
$idlow = $_GET['detail-lowongan'];
$sql = "select * from lowongan,employer,perusahaan where lowongan.id_employer = employer.id_employer and employer.id_perusahaan = perusahaan.id_perusahaan and lowongan.id_lowongan = '$idlow'";
$query = mysql_query($sql);
$getlowongan = mysql_fetch_object($query);
$querykat = mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$getlowongan->id_kat_lowongan'");
$getkat = mysql_fetch_object($querykat);
//echo $sql;
?>



<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Detail Lowongan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <blockquote><h3><?= $getlowongan->judul; ?></h3>
                        <small>Diposting oleh <b><a><?= $getlowongan->nama; ?></a></b> dari <b><a><?= $getlowongan->nama_perusahaan; ?></a></b> di <?= $getlowongan->provinsi_perusahaan; ?> pada <?= $getlowongan->tgl_posting; ?></small>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <img src="logo-perusahaan/<?= $getlowongan->logo; ?>" style="width:150px; height:100px;" align="right" class="img img-thumbnail">
                </div>
            </div>

            <b><h4>Detail Lowongan :</h4></b>
            <div class="well">
                <?= $getlowongan->deskripsi; ?>

                <b><h4>Tanggal Berakhir Lowongan :</h4></b>

                <?= $getlowongan->tgl_tutup; ?>

                <b><h4>Pelamar oleh penjab:</h4></b><br>
                <?php
                $sql = "SELECT pelamar.id_penjab, count(pelamar.id_penjab) jml,penjab.nama FROM pelamar,penjab where pelamar.id_penjab = penjab.id_penjab and pelamar.id_lowongan = '$getlowongan->id_lowongan' GROUP BY pelamar.id_penjab";
                $querypelamar = mysql_query($sql);
                while ($getplmr = mysql_fetch_object($querypelamar)) {

                    echo "<button class='btn btn-success' disabled>$getplmr->id_penjab - $getplmr->nama ($getplmr->jml siswa)</button>&nbsp;";
                }
                ?>
            </div>
        </div>

        <div class="panel-footer">
            <button name="rekomendasi" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Rekomendasikan Siswa</button>
            <a href="?lihat-lowongan" class="btn btn-warning">Kembali</a>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lowongan Kerja</h4>
                        </div>
                        <div class="modal-body">
                            Siswa yang sudah direkomendasikan : <br>
<?php
$querymysis = mysql_query("select * from pelamar,siswa where pelamar.id_siswa = siswa.id_siswa and siswa.id_sekolah = '$sekolah->id_sekolah' ");
$count = mysql_num_rows($querymysis);
$count = 1;
while ($getmysis = mysql_fetch_object($querymysis)) {
    if ($count > 0 && $count % 4 == 0) {
        echo "<br>";
    }
    $count++;

    echo "<strong><span class='label label-success'>$getmysis->nama <a href='' title='Batalkan'>x</a></span></strong>&nbsp;";
    /* for($i=3;$i>=$count;$i++)	  
      {
      echo "<strong><span class='label label-success'>$getmysis->nama <a href='' title='Batalkan'>x</a></span></strong>&nbsp;";
      } */
}
?>
                            <hr>
                            <script>$(document).ready(function() {
                                    $('#table_id').DataTable();
                                });</script>
                            <table id="table_id" class="display table-bordered">
                                <thead>
                                    <tr>
                                <form method='post' action=''>
                                    <th>Nama</th>
                                    <th width='150'>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
$sqlnotin = "SELECT * FROM siswa WHERE  id_siswa NOT IN (SELECT id_siswa FROM pelamar) and id_sekolah = '$sekolah->id_sekolah'";
$querysis = mysql_query($sqlnotin);

while ($sis = mysql_fetch_object($querysis)) {
    $idsis = $sis->id_siswa;
    $idsklh = $sis->id_sekolah;
    $idpkt = $sis->id_paket;
    echo "<tr>";

    echo "<th>$sis->nama</th>";

    echo "<th><input name='checkbox[]' type='checkbox' id='checkbox[]' value='$idsis'></th>&nbsp;";

    echo "</tr>";
}
?>
                                    </tbody>
                            </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" name='go' class="btn btn-primary" >Rekomendasikan Yang Terpilih</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
if (isset($_POST['go'])) {

    for ($i = 0; $i < $count; $i++) {
        if (isset($_POST['checkbox'][$i])) {
            $idsis = $_POST['checkbox'][$i];
            $idpenjab = $id;
            $idlow = $getlowongan->id_lowongan;
            $date = date("y/m/d");
            $isi = "insert into pelamar values('','$idpenjab','$idsis','$idlow','1','$date')";
            $sqltambah = mysql_query($isi) or die(mysql_error());
        }
    }
    if ($sqltambah) {
        ?>
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <span class="sr-only"></span>
                Siswa sudah direkomendasikan
            </div>

            <?php
        }
        if (!$sqltambah) {
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

