<?php
$idsekolah = $_GET['detail'];
$id = strtoupper($id);
$query = mysql_query("select * from sekolah where id_sekolah = '$idsekolah'");
$sekolah = mysql_fetch_object($query);
?>
<script type="text/javascript" src="datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="datepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Detail Sekolah</h3>
        </div>
        <div class="panel-body">

    <div class="form-group"><label for="editor1">Nama Sekolah / PKBM</label><input type="text" class="form-control" name="nama_pkbm" required value = '<?= $sekolah->nama ?>' disabled></div>	
    <div class="form-group"><label for="editor1">Penanggung Jawab </label></div>
    <div class="form-group">
        <select name="penjab" class="form-control" disabled>
    <?php
    $penjabnow = $sekolah->id_penjab;
    $querypenjabnow = mysql_query("select * from penjab where id_penjab = '$penjabnow'");
    $getpenjab = mysql_fetch_object($querypenjabnow);
    echo "<option value='$getpenjab->id_penjab'>$getpenjab->id_penjab - $getpenjab->nama - $getpenjab->kota,$getpenjab->prov</option>";
    echo "<option></option>";
    ?>
            <?php
            $querypenjab = mysql_query("select * from penjab");
            while ($penjab = mysql_fetch_object($querypenjab)) {
                echo "<option value='$penjab->id_penjab'>$penjab->id_penjab - $penjab->nama - $penjab->kota,$penjab->prov</option>";
            }
            ?>

        </select></div>	
    <div class="form-group"><label for="editor1">Provinsi</label><input type="text" disabled class="form-control" name="prov_pkbm" required value = '<?= $sekolah->prov ?>'></div>	
    <div class="form-group"><label for="editor1">Kota</label><input type="text" disabled class="form-control" name="kota_pkbm" required value = '<?= $sekolah->kota ?>'></div>	
    <div class="form-group"><label for="editor1">Tanggal Berdiri</label>
    </div>
    <div class="form-group">
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="10" type="text" disabled name="tgl_pkbm" value='<?= $sekolah->tgl_berdiri ?>'>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
        </div>
        <input type="hidden" id="dtp_input2" value=""/>
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
    <div class="form-group"><label for="editor1">Telp.</label><input type="text" disabled class="form-control" name="telp" required value = '<?= $sekolah->telp ?>' ></div>	

    <div class="form-group"><label for='alamat'>Alamat</label><br><textarea disabled cols="80" id="alamat" name="alamat" rows="10" class="form-control"><?= $sekolah->Alamat ?></textarea></div>	
    </div>
    <div class="panel-footer">
        <a href="index.php" class="btn btn-success btn-warning btn-lg">Kembali</a>
    </div>
	

