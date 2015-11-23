<?php
$idlow = $_GET['detail-lowongan'];
$sql = "select * from lowongan,employer,perusahaan where lowongan.id_employer = employer.id_employer and employer.id_perusahaan = perusahaan.id_perusahaan and lowongan.id_lowongan = '$idlow'";
$query = mysql_query($sql);
$get = mysql_fetch_object($query);
$querykat = mysql_query("select * from kategori_lowongan where id_kat_lowongan = '$get->id_kat_lowongan'");
$getkat = mysql_fetch_object($querykat);

//echo $sql;
?>

<script src="../dependency/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>

<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Detail Lowongan</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#lowongan" aria-controls="lowongan" role="tab" data-toggle="tab">Informasi Lowongan</a></li>
                <li role="presentation"><a href="#pelamar" aria-controls="pelamar" role="tab" data-toggle="tab">Pelamar</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="lowongan">
                    <br>
                    <div class="form-group"><label for="Emp">Employer</label>
                        <select name="id_emp" class="form-control">
                            <option value='<?= $get->id_employer; ?>'><?= $get->nama_perusahaan; ?> - <?= $get->nama; ?></option>
                            <option>--------------------</option>
                            <?php
                            $queryemp = mysql_query("select * from employer,perusahaan where employer.id_perusahaan = perusahaan.id_perusahaan");
                            while ($getemp = mysql_fetch_object($queryemp)) {
                                echo "<option value='$getemp->id_employer'>$getemp->nama_perusahaan - $getemp->nama </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group"><label for="Emp">Kategori Lowongan</label>
                        <select name="id_kat" class="form-control">
                            <option value='<?= $getkat->id_kat_lowongan ?>'><?= $getkat->nama ?></option>
                            <option>--------------------</option>
                            <?php
                            $querykat = mysql_query("select * from kategori_lowongan");
                            while ($getkat = mysql_fetch_object($querykat)) {
                                echo "<option value='$getkat->id_kat_lowongan'>$getkat->nama </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group"><label for="lowongan">Judul Lowongan</label><input type="text" class="form-control" name="judul" required value='<?= $get->judul; ?>'></div>
                    <div class="form-group"><label for="lowongan">Posisi</label><input type="text" class="form-control" name="posisi"value='<?= $get->posisi; ?>'></div>
                    <div class="form-group"><label for='alamat'>Deksripsi Kebutuhan</label><br><textarea class="ckeditor" id="editor1" name="deskp" rows="10"" rows="10"><?= $get->deskripsi; ?></textarea></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir Lowongan</label>
                                <div class="input-group date form_date"  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">

                                    <input class="form-control" type="text" name="dateclose" placeholder='Tgl Posting' value='<?= $get->tgl_posting; ?>'>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <script type="text/javascript">
                                    $('.form_date').datetimepicker({
                                        language: 'id',
                                        weekStart: 1,
                                        todayBtn: 1,
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 2,
                                        minView: 2,
                                        forceParse: 0
                                    });
                                </script>
                            </div>
                        </div>	
                        <!--			<div class="col-md-6">			
                                                <div class="form-group"><label for='alamat'>Status Lowongan</label><br>
                                                <select name="status" class="form-control" required>
                                                <option value='<?= $get->status; ?>'><?= $get->status; ?></option>
                                                <option>----------------</option>
                                                <option value="Terbit">Terbit</option>
                                                <option value="Tahan">Tahan</option>
                                                </select>
                                                </div>
                                                </div>-->
                    </div>


                    <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
                    <a href="?lihat-lowongan" class="btn btn-warning">Kembali</a>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="pelamar">
                    <br>
                    <div class="table-responsive">
                        <?php include 'include/dependency.php'; ?>
                        <script>$(document).ready(function() {
                                $('#table_id').DataTable();
                            });</script>
                        <table id="table_id" class="display table-bordered">
                            <thead>
                                <tr>
                                    <th >ID Siswa</th>
                                    <th >Nama</th>
                                    <th>Penjab</th>
                                    <th width='10'>Sekolah</th>
                                    <th>Tgl Melamar</th>
                                    <th>Status</th>
                                    <th width='200'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from pelamar plmr,siswa s where plmr.id_siswa = s.id_siswa and plmr.id_lowongan = '$idlow'";

                                $sqlpelamar = mysql_query($sql);
                                while ($getpelamar = mysql_fetch_object($sqlpelamar)) {
                                    ?>    
                                    <tr>
    <!--                                        <th><div class="res"><a href='<?= $getpelamar->id_siswa ?>'  data-toggle="modal" data-target="#modalsiswa"><?= $getpelamar->id_siswa ?></a></div></th>-->
                                        <th><div class="res"><a href='#'><?= $getpelamar->id_siswa ?></a></div></th>
                                <th><?= $getpelamar->nama ?></th>
                                <th><?php
                                    $penjab = mysql_query("select siswa.foto as foto_siswa , siswa.telp as siswa_telp, sekolah.telp, sekolah.Alamat, siswa.email , sekolah.kota , sekolah.prov ,  sekolah.id_sekolah , sekolah.nama as nm_sekolah , penjab.nama as nm_penjab  from sekolah,siswa,penjab where siswa.id_siswa = '$getpelamar->id_siswa' and siswa.id_sekolah = sekolah.id_sekolah and sekolah.id_penjab = penjab.id_penjab");
                                    $getpenjab = mysql_fetch_object($penjab);
                                    echo $getpenjab->nm_penjab;
                                    ?></th>
                                <th><?= $getpenjab->nm_sekolah; ?></th>
                                <th><?= $getpelamar->tgl_lamar ?></th>
                                <th><?php
                                    if ($getpelamar->status == 'N') {
                                        echo 'Sudah Diajukan';
                                    } elseif ($getpelamar->status == 'A') {
                                        echo 'Disetujui';
                                    } elseif ($getpelamar->status == 'R') {
                                        echo 'Ditolak';
                                    }
                                    ?></th>
                                <th><a href="?lowongan=<?= $getpelamar->id_lowongan ?>&setujui-pelamar=<?= $getpelamar->id ?>" class="btn btn-success " <?php
                                    if ($getpelamar->status == 'A') {
                                        echo 'disabled';
                                    }
                                    ?> 
                                       onclick='return confirm("Yakin menyetujui pelamar ini?")'  >
                                        Setujui</a>&nbsp;
                                    <a href="?lowongan=<?= $getpelamar->id_lowongan ?>&tolak-pelamar=<?= $getpelamar->id ?>" class="btn btn-danger " <?php
                                    if ($getpelamar->status == '3') {
                                        echo 'disabled';
                                    }
                                    ?> onclick='return confirm("Yakin menolak pelamar ini?")' >Tolak</a>&nbsp;

                                    </tr>
                                    <script>

                                    </script>
                                <div class="modal fade" id="modalsiswa" tabindex="-1" role="dialog" aria-labelledby="modalsiswa">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><?= $getpelamar->nama ?> - <?= $getpenjab->nm_sekolah; ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">    
                                                        <p><span class="fa fa-university" aria-hidden="true"></span>&nbsp;&nbsp;<?= $getpenjab->id_sekolah ?> - <?= $getpenjab->nm_sekolah ?>
                                                        <p><span class="fa fa-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?= $getpenjab->telp ?> (telp. PKBM)
                                                        <p><span class="fa fa-location-arrow" aria-hidden="true"></span>&nbsp;&nbsp;<?= $getpenjab->Alamat ?> - <?= $getpenjab->kota ?> - <?= $getpenjab->prov ?>
                                                        <p><span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<?= $getpenjab->email ?>
                                                        <p><span class="    glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?= $getpenjab->siswa_telp ?> (kontak siswa)
                                                    </div>            
                                                    <div class="col-md-6 col-sm-6 col-xs-6">    

                                                        <center>
                                                            <img src="../img/profil/<?php
                                                            if (empty($getpenjab->foto_siswa)) {
                                                                echo "noimg.jpg";
                                                            } else {
                                                                echo $getpenjab->foto_siswa;
                                                            }
                                                            ?>" id="gambar_nodin3" style="width: 240px; height:240px;" alt="Preview Gambar" class="img-circle img-responsive"/>
                                                        </center>
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>    
                            </tbody>
                        </table>

                    </div>
                </div></div>
            </form>


            <?php
            if (isset($_POST['simpan'])) {

                $idkat = $_POST['id_kat'];
                $judul = mysql_escape_string($_POST['judul']);
                $posisi = mysql_escape_string($_POST['posisi']);
                $desk = mysql_escape_string($_POST['deskp']);
                $status = 'Tahan';
                $dateclose = $_POST['dateclose'];
                $isi = "update lowongan set id_kat_lowongan = '$idkat',judul = '$judul',posisi = '$posisi', deskripsi = '$desk',tgl_tutup = '$dateclose',status = '$status' where id_lowongan = '$get->id_lowongan' ";
                //echo $isi;
                $sqltambah = mysql_query($isi) or die(mysql_error());
                if ($sqltambah) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                        Lowongan sudah diubah
                    </div>
                    <meta http-equiv="refresh" content= "1;URL=?lihat-lowongan"/>
                    <?php
                }
                if (!$sqltambah) {
                    echo '
		<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Gagal
		</div>
		';
                }
            }
            ?>
        </div>

