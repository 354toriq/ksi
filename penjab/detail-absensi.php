<?php
include 'include/dependency.php';
$idabsen = $_GET['detail'];
$query = mysql_query("select * from absensi where id_absensi = '$idabsen'");
$absen = mysql_fetch_object($query);
$hadir = mysql_num_rows(mysql_query("Select * from detail_absensi where id_absensi = '$idabsen' and status = 'H'"));
$ijin = mysql_num_rows(mysql_query("Select * from detail_absensi where id_absensi = '$idabsen' and status = 'I'"));
$noabsen = mysql_num_rows(mysql_query("Select * from detail_absensi where id_absensi = '$idabsen' and status = 'A'"));
?>
<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<form method="post" enctype="multipart/form-data" name='form1'>
    <div class="panel panel-primary">
        <div class="panel-heading">

            <h3 class="panel-title"><?= $absen->judul; ?></h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Detail Absensi</a></li>
                <li role="presentation"><a href="#siswa" aria-controls="siswa" role="tab" data-toggle="tab">Siswa Absensi</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="detail">
                    <!-- Detail Absen-->
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="editor1">Judul Absensi</label><input type="text" class="form-control" name="judul" value = "<?= $absen->judul ?>" ></div>

                            <div class="form-group"><label for="editor1">Tanggal Mulai Absensi</label>

                                <div class="input-group date form_date col-md-12"  data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" type="text" name="tgl_absen_mulai" placeholder='Tgl Absensi' value = "<?= $absen->tgl_mulai ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
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
                            <div class="form-group"><label for="editor1">Tanggal Berakhir Absensi</label>

                                <div class="input-group date form_date2 col-md-12"  data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" type="text" name="tgl_absen_akhir" placeholder='Tgl Absensi' value = "<?= $absen->tgl_akhir ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                            <script type="text/javascript">
                                $('.form_date2').datetimepicker({
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
                        <div class="col-md-6">
                            <div class="form-group"><label for='alamat'>Keterangan</label><br><textarea class="form-control" id="alamat" name="ket" rows="5"><?= $absen->keterangan ?></textarea></div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <h2>Hadir : <?= $hadir ?></h2>
                        </div>
                        <div class="col-md-4">
                            <h2>Absen : <?= $noabsen ?></h2>
                        </div>
                        <div class="col-md-4">
                            <h2>Ijin : <?= $ijin ?></h2>
                        </div>

                    </div>

                    <hr>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-info"> <a href="?lihat-absensi" class="btn btn-warning">Kembali</a>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $judul = $_POST['judul'];
                        $mulai = $_POST['tgl_absen_mulai'];
                        $akhir = $_POST['tgl_absen_akhir'];
                        $keterangan = mysql_escape_string($_POST['ket']);
                        $sql_update = "update `absensi` set judul = '$judul' , tgl_mulai = '$mulai' , tgl_akhir = '$akhir' , keterangan = '$keterangan' where id_absensi = '$idabsen'";
                        $update = mysql_query($sql_update);
                        if ($sql_update) {
                            echo '
                        <hr>
                        <meta http-equiv="refresh" content= "1"/>
		<div class="alert alert-success dismissable" role="alert">
		<span class="glyphicon glyphicon-success" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Absensi sudah diubah
		</div>
		';
                        }
                    }
                    ?>
                    </form>
                    <!-- /Detail Absen -->
                    <?php include 'include/dependency.php'; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="siswa">
                    <br>
                    <form method='post' name='form[0]' action=''>
                        <div class="table-responsive">


                            <!-- select all boxes -->


                            <script>$(document).ready(function() {
                                    $('#table_id').DataTable();
                                });

                            </script>
                            <table id="table_id" class="display table-bordered" border='0'>
                                <thead>
                                    <tr>

                                        <th width='20'>Pilih</th>
                                        <th>No</th>
                                        <th>ID Siswa</th>
                                        <th>Nama</th>
                                        <th>Tgl Absen</th>
                                        <th>Status</th>
                                        <th width='200'>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sqlsiswaabs = mysql_query("select dtl.*,s.nama from detail_absensi as dtl , siswa as s where dtl.id_absensi = '$absen->id_absensi' and dtl.id_siswa = s.id_siswa");
                                    $count = mysql_num_rows($sqlsiswaabs);
                                    $i = 1;
                                    while ($siswa = mysql_fetch_object($sqlsiswaabs)) {
                                        echo "<tr>";
                                        echo "<th><input type='checkbox' name='check[]' value='$siswa->id_detail_absensi' id='checknow'></th>";
                                        echo "<th>$i</th>";
                                        echo "<th>$siswa->id_siswa</th>";
                                        echo "<th>$siswa->nama</th>";
                                        echo "<th>$siswa->tgl</th>";
                                        echo "<th>";
                                        if ($siswa->status == 'H') {
                                            echo "Hadir";
                                        } elseif ($siswa->status == 'S') {
                                            echo "Sakit";
                                        } elseif ($siswa->status == 'I') {
                                            echo "Ijin";
                                        }
                                        echo '</th>';
                                        echo '<th>';
                                        ?>

                                    <select name="status2[]" class="form-control" id='status-select' disabled="disabled">

                                        <?php
                                        if ($siswa->status == 'H') {
                                            echo "<option value = 'H'>Hadir</option>";
                                        } elseif ($siswa->status == 'S') {
                                            echo "<option value = 'S'>Sakit</option>";
                                        } elseif ($siswa->status == 'I') {
                                            echo "<option value = 'I'>Ijin</option>";
                                        }
                                        ?>
                                        <option>-------------</option>
                                        <option value = 'H'>Hadir</option>
                                        <option value = 'S'>Sakit</option>
                                        <option value = 'I'>Ijin</option>

                                    </select>


                                    <?php
                                    echo "</th>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>

                                </tbody>
                            </table>
                            <input type="checkbox" name="select-all" id="select-all" /> Pilih Semua
                            <script>
                                $('#select-all').click(function(event) {
                                    if (this.checked) {
                                        // Iterate each checkbox
                                        $(':checkbox').each(function() {
                                            this.checked = true;

                                        });
                                    }

                                    else {
                                        // Iterate each checkbox
                                        $(':checkbox').each(function() {
                                            this.checked = false;

                                        });
                                    }

                                });


                            </script>
                            <!--<script>
                                                    $(document).ready( function () {
                                                            
                                                    $('#checknow').change(function() {   
                                if ($(this).is(':checked')) {
                            
                                        $('#status-select').removeAttr('disabled'); //enable input
                            
                                    } else {
                                        $('#status-select').attr('disabled', true); //disable input
                                    }
                                    
                            })});
                            
                            </script>-->
                            <hr>
                            <input type="submit" name="simpan-siswa-detail-absensi" value="Simpan" class="btn btn-info"> <a href="?lihat-absensi" class="btn btn-warning">Kembali</a>
                        </div>

                </div>





                </form>

                <?php
                if (isset($_POST['simpan-siswa-detail-absensi'])) {
                    for ($i = 0; $i < $count; $i++) {
                        $selection = $_POST['check'][$i];
                        $status = $_POST['status2'][$i];
                        $date = mysql_query('select now()');
//        echo $selection . '<br>';
//        echo $status;
                        //$isi			=	"insert into detail_absensi values('','$idabsen','$selection','$status','$date')";
                        $update = "update `detail_absensi` set status = '$status' where id_detail_absensi = '$selection' ";
                        $sqltambah = mysql_query($update) or die(mysql_error());
                    }
                    if ($sqltambah) {
                        echo '
                    <hr>
                    <meta http-equiv="refresh" content= "1"/>
		<div class="alert alert-success dismissable" role="alert">
		<span class="glyphicon glyphicon-success" aria-hidden="true"></span>
		<span class="sr-only"></span>
		Absensi sudah ditambahkan
		</div>
		';
                    }
                }
                ?>
