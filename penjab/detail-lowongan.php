<?php
//include 'include/dependency.php';
$idlow = $_GET['detail-lowongan'];
$sql = "select * from lowongan,employer,perusahaan where lowongan.id_employer = employer.id_employer and employer.id_perusahaan = perusahaan.id_perusahaan and lowongan.id_lowongan = '$idlow'";
$query = mysql_query($sql);
$getlowongan = mysql_fetch_object($query);
$querykat = mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$getlowongan->id_kat_lowongan'");
$getkat = mysql_fetch_object($querykat);
?>



<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Detail Lowongan</h4>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Detail Lowongan</a></li>
                <li role="presentation"><a href="#pelamar-semua" aria-controls="pelamar-semua" role="tab" data-toggle="tab">Semua Pelamar</a></li>
                <li role="presentation"><a href="#pelamar-rekomendasi" aria-controls="pelamar-rekomendasi" role="tab" data-toggle="tab">Siswa Rekomendasi</a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active " id="detail">
                    <br>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                            <blockquote><h4><?= $getlowongan->judul; ?></h4>
                                <small>Diposting oleh <b><a><?= $getlowongan->nama; ?></a></b> dari <b><a><?= $getlowongan->nama_perusahaan; ?></a></b> di <?= $getlowongan->provinsi_perusahaan; ?> pada <?= $getlowongan->tgl_posting; ?></small>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4"><br    >
                            <img src="../img/profil-employer/<?= $getlowongan->foto; ?>" style="width:150px; height:100px;" align="right" class="img img-thumbnail">
                        </div>
                    </div>

                    <b><h4>Detail Lowongan :</h4></b>
                    <div class="well">
                        <p><?= $getlowongan->deskripsi; ?></p>

                        <strong>Tanggal Berakhir Lowongan :</strong>
                        <br><br>
                        <?= $getlowongan->tgl_tutup; ?>
                        <br><br>
                        <strong>Pelamar oleh penjab:</strong><br><br>   
                        <?php
                        $sql = "SELECT count(p.id) as jumlah_pelamar FROM `pelamar` p,sekolah s,siswa sw,penjab pj WHERE p.id_siswa = sw.id_siswa and sw.id_sekolah = s.id_sekolah and pj.id_penjab = s.id_penjab and p.id_lowongan = '$getlowongan->id_lowongan' and pj.id_penjab = '$penjab->id_penjab'";
                        $querypelamar = mysql_query($sql);
                        $getplmr = mysql_fetch_object($querypelamar);

                        echo "<button class='btn btn-success' disabled>$penjab->id_penjab - $penjab->nama ($getplmr->jumlah_pelamar siswa)</button>&nbsp;";
                        ?>
                    </div>

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

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" name='go' class="btn btn-primary" >Rekomendasikan Yang Terpilih</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="pelamar-semua">
                    <br>
                    <?php
                    $sqlpelamarsemua = mysql_query("SELECT *,s.nama nama_sekolah,sw.foto foto_siswa,sw.nama nama_siswa FROM `pelamar` p,sekolah s,siswa sw,penjab pj WHERE p.id_siswa = sw.id_siswa and sw.id_sekolah = s.id_sekolah and s.id_penjab = pj.id_penjab and p.id_lowongan = '$getlowongan->id_lowongan'");
                    while ($getpelamarsemua = mysql_fetch_object($sqlpelamarsemua)) {
                        ?> 
                        <img src="../img/profil/<?php
                        if ($getpelamarsemua->foto_siswa != "") {
                            echo $getpelamarsemua->foto_siswa;
                        } else {
                            echo "noimg.jpg";
                        }
                        ?>" class="img-circle" width="100px" height="100px" style="border:solid; border-color:#428BCA;" title="<?= $getpelamarsemua->id_siswa ?> - <?= $getpelamarsemua->nama_siswa ?> - <?= $getpelamarsemua->nama_sekolah ?>">
                             <?php
                         }
                         ?>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="pelamar-rekomendasi">
                    <script>$(document).ready(function() {
                            $('#rekomendasi-table').DataTable();

                        });</script>
                    <br>
                    <?php
                    $sqlrekpelamar = mysql_query("SELECT *,s.nama nama_sekolah,sw.foto foto_siswa,sw.nama nama_siswa,p.status status_pelamar,sw.email email_siswa FROM `pelamar` p,sekolah s,siswa sw,penjab pj WHERE p.id_siswa = sw.id_siswa and sw.id_sekolah = s.id_sekolah and s.id_penjab = pj.id_penjab and p.id_lowongan = '$getlowongan->id_lowongan' and pj.id_penjab = '$penjab->id_penjab'");
                    ?>

                    <div class="table-responsive">
                        <table id="rekomendasi-table"  class="table table-bordered display" cellspacing="0" width="100%" >    
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jn. Kelamin</th>
                                    <th>Email</th>
                                    <th>Telp. </th>
                                    <th>Status </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($getpelamar = mysql_fetch_object($sqlrekpelamar)) {
                                    ?> 
                                    <tr>
                                        <th><?= $getpelamar->id_siswa ?></th>
                                        <th><?= $getpelamar->nama_siswa ?></th>
                                        <th><?= $getpelamar->jnsklmn ?></th>
                                        <th><?= $getpelamar->email_siswa ?></th>
                                        <th><?= $getpelamar->telp ?></th>
                                        <th>
                                            <?php
                                            if ($getpelamar->status_pelamar == "N") {
                                                echo "<h4><span class='label label-primary'>Sedang Diajukan</span></h4>";
                                            } elseif ($getpelamar->status_pelamar == "A") {
                                                echo "<h4><span class='label label-success'>Disetujui</span></h4>";
                                            }elseif($getpelamar->status_pelamar == "R") {
                                                echo "<h4><span class='label label-danger'>Ditolak</span></h4>";
                                            } ?></th>
                                    </tr>
    <?php
}
?>
                            </tbody>
                        </table>

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
                $isi = "insert into pelamar values('','$idsis','$idlow','N',now(),now())";
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
            <meta http-equiv="refresh" content= "1;URL=?detail-lowongan=<?=$idlow?>"/>

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

