	
<?php
include 'include/cek_session.php';
include 'include/database.php';
include 'include/dependency.php';

$idemp = $_GET['detail'];


//echo $sql;
//echo $sql;
?>
<script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<body class="skin-black">
    <?php include 'include/header.php'; ?>
    <aside class="right-side">
        <section class="content">

            <div class="panel panel-primary">
                <div class="panel-heading">

                    <h3 class="panel-title">Detail Employer</h3>
                </div>
                <div class="panel-body">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profil" aria-controls="profil" role="tab" data-toggle="tab">Profil</a></li>
                        <li role="presentation"><a href="#perusahaan" aria-controls="perusahaan" role="tab" data-toggle="tab">Perusahaan</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profil">
                            <?php
                            $sql_profil = "select * from employer where id_employer = '$idemp'";
                            $query_profil = mysql_query($sql_profil);
                            $get = mysql_fetch_object($query_profil);
                            ?>
                            <div class="row">
                                <form action="" method='post' enctype="multipart/form-data" >
                                    <div class='col-md-6'>
                                        <br>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama Panjang  ...  " type="text" name='nama' required value='<?= $get->nama; ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="radio radio-primary">
                                                <label>
                                                    <input type="radio" name="kelamin" id="optionsRadios1" value="Pria" <?php
                                                    if ($get->jnsklmn == "Pria") {
                                                        echo "checked";
                                                    }
                                                    ?>><span class="circle"></span><span class="check"></span>
                                                    Pria
                                                </label>
                                            </div>
                                            <div class="radio radio-primary">
                                                <label>
                                                    <input type="radio" name="kelamin" id="optionsRadios2" value="Wanita" <?php
                                                    if ($get->jnsklmn == "Wanita") {
                                                        echo "checked";
                                                    }
                                                    ?>><span class="circle"></span><span class="check"></span>
                                                    Wanita
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group date form_date "  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                <input class="form-control" type="text" name="tgllahir" placeholder='Tgl Lahir' value='<?= $get->tgllhr; ?>'>
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
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" placeholder="Alamat"><?= $get->alamat; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak</label>
                                            <input class="form-control" placeholder="Telp.   " type="number" name='kontak' value='<?= $get->telp; ?>' required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <div class="form-group">
                                            <label>Pendidikan Akhir</label>
                                            <select name='pendidikan' class="form-control">
                                                <option value='<?= $get->pendidikan; ?>'><?= $get->pendidikan; ?></option>
                                                <option>---------------------</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenjang Pendidikan</label>
                                            <input class="form-control"  type="text"   name='jenjang' placeholder="Nama Sekolah / Universitas - Kelas / Jurusan" value='<?= $get->jenjang; ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  type="email"  name='email'  placeholder="email@email.com" value='<?= $get->email; ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  type="text"  name='password'  placeholder="Password" value='<?= $get->password; ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Foto</label>
                                            <!-- <input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload"> -->
                                            <br>
                                            <div class="row col-sm-12">	
                                                <img src="../img/profil-employer/<?php
                                                if (empty($get->foto)) {
                                                    echo "noimg.png";
                                                } else {
                                                    echo $get->foto;
                                                }
                                                ?>" id="gambar_nodin" style="width: 250px; height:300px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
                                                <output id="gambar_nodin"></output>
                                                <input type="file" name="foto" id="preview_gambar" class="btn btn-info" value="<?= $sis->foto ?>"/>

                                                <script>
                                                    function bacaGambar(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e)
                                                            {
                                                                $('#gambar_nodin').attr('src', e.target.result);
                                                            }
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                </script>
                                                <script>
                                                    $("#preview_gambar").change(function() {
                                                        bacaGambar(this);
                                                    });
                                                </script> 
                                            </div>

                                        </div>
                                    </div>

                            </div>
                            <hr>
                            <button name='simpan-profil' class='btn btn-success btn-lg'>Simpan Profil</button>
                            </form>
                        </div>
                        <?php
                        if (isset($_POST['simpan-profil'])) {
                            $nama = mysql_escape_string($_POST['nama']);
                            $kelamin = $_POST['kelamin'];
                            $tgllahir = $_POST['tgllahir'];
                            $fotoemp = $_FILES['foto']['name'];
                            $pdkn = $_POST['pendidikan'];
                            $jenjang = $_POST['jenjang'];
                            $email = $_POST['email'];
                            $kontak = $_POST['kontak'];
                            $password = mysql_escape_string($_POST['password']);
                            $alamat = mysql_escape_string($_POST['alamat']);
                            $sql = "update employer set nama = '$nama' , jnsklmn = '$kelamin' , tgllhr = '$tgllahir' , alamat = '$alamat' , pendidikan = '$pdkn' , jenjang = '$jenjang' ,  password = '$password' , email = '$email' , telp = '$kontak' where id_employer = '$idemp' ";
                            $query_update = mysql_query($sql);
                            $sizefoto = $_FILES['foto']['size'];
                            $maxsize = 700000;
                            if (($sizefoto >= $maxsize)) {

                                echo "<script>alert('File Gambar harus kurang dari 700 KB, ukuran sekarang $sizefoto');</script>";
                                die();
                            }
                            if (empty($fotoemp)) {
                                $fotoemp = $get->foto;
                            }
                            $isi = mysql_query("UPDATE `employer` SET `foto` = '$fotoemp' WHERE `id_employer` = '$idemp'");
                            //echo $isi;
                            if ($fotoemp != $get->foto) {
                                $folder = "../img/profil-employer/";
                                if ($get->foto != '') {
                                    $delete = unlink('../img/profil-employer/' . $get->foto . '');
                                }
                                $data = $folder . basename($fotoemp);
                                $move = move_uploaded_file($_FILES['foto']['tmp_name'], $data);
                            }
                        }
                        ?>
                        <div role="tabpanel" class="tab-pane" id="perusahaan">
                            <br>
                            <?php
                            if ($get->id_perusahaan == '') {
                                echo "<div class='col-md-12'>
                                    <h2>Anda belum mengisi perusahaan. Klik <a href='#' data-toggle='modal' data-target='#myModal'>di sini</a></h2><br>";
                            } else {
                                ?>
                                <!--                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <select name="perusahaan" class="form-control">
                                                                            <option value='1'>Sudah ada</option>
                                                                            <option value='2'>Buat Baru</option>
                                                                    </select>
                                                                        <div class="radio radio-primary">
                                                                            
                                                                            <label>
                                                                                <input type="radio"  name='perusahaan' value='1' data-id="last" id="optionsRadios1" <?php
                                if ($get->perusahaan == "ada") {
                                    echo 'checked';
                                }
                                ?>><span class="circle"></span>
                                                                                Perusahaan Sudah Ada
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio radio-primary">
                                                                            <label>
                                                                                <input type="radio" name='perusahaan' value='2' data-id="new" id="optionsRadios1"<?php
                                if ($get->perusahaan == "baru") {
                                    echo 'checked';
                                }
                                ?> /><span class="circle"></span>
                                                                                Perusahaan Baru
                                                                            </label>
                                                                        </div> 
                                
                                                                    </div>						
                                                                </div>			
                                
                                                                <hr />-->
                                <?php
                                $getpsh = mysql_query("select * from perusahaan where id_perusahaan = '$get->id_perusahaan'");
                                $dataperusahaan = mysql_fetch_object($getpsh);
                                if ($dataperusahaan->dibuat_oleh == $idemp) {
                                    ?>
                                    <div class="row">
                                        <div class='col-md-6'>
                                            <div class="form-group">
                                                <label>Nama Perusahaan</label>
                                                <input class="form-control" placeholder="Nama Perusahaan" type="text" name="nama_perusahaan" value='<?= $dataperusahaan->nama_perusahaan; ?>' >
                                            </div>
                                            <div class="form-group">
                                                <label>Negara</label>
                                                <input class="form-control" placeholder="Negara" type="text" name="negara_perusahaan" value='<?= $dataperusahaan->negara_perusahaan; ?>'>
                                            </div>
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <input class="form-control" placeholder="Provinsi" type="text" name="prov_perusahaan" value='<?= $dataperusahaan->provinsi_perusahaan; ?>'>
                                            </div>
                                            <div class="form-group">
                                                <label>Email Perusahaan</label>
                                                <input class="form-control" placeholder="Email Perusahaan" type="email" name="email_perusahaan" value='<?= $dataperusahaan->email_perusahaan; ?>'>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar2">Logo</label>
                                                <!-- <input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload"> -->
                                                <br>

                                                <img src="../img/logo-perusahaan/<?php
                                                if (empty($dataperusahaan->logo)) {
                                                    echo "nodoc.jpg";
                                                } else {
                                                    echo $dataperusahaan->logo;
                                                }
                                                ?>" id="gambar_nodin2" style="width: 150px; height:150px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
                                                <output id="gambar_nodin2"></output>
                                                <input type="file" name="logo" id="preview_gambar2" class="btn btn-info" value="<?= $dataperusahaan->logo ?>"/>

                                                <script>
                                                    function bacaGambar2(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e)
                                                            {
                                                                $('#gambar_nodin2').attr('src', e.target.result);
                                                            }
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                </script>
                                                <script>
                                                    $("#preview_gambar2").change(function() {
                                                        bacaGambar2(this);
                                                    });
                                                </script> 


                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kontak Perusahaan</label>
                                                <input class="form-control" placeholder="Kontak Perusahaan" type="number" name="kontak_perusahaan" value='<?= $dataperusahaan->kontak_perusahaan; ?>'>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Perusahaan</label>
                                                <textarea class='form-control' name="alamat_perusahaan" row='3'><?= $dataperusahaan->alamat_perusahaan ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan di Perusahaan</label>
                                                <input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan" value='<?= $get->jabatan ?>'>
                                            </div>
                                            <div class="form-group">
                                                <label>Website Perusahaan</label>
                                                <input class="form-control" placeholder="Website" type="text" name="web_perusahaan" value='<?= $dataperusahaan->website ?>'>
                                            </div>

                                            <div class="form-group">
                                                <label>Deskripsi Perusahaan</label>
                                                <textarea class='form-control' name="deskp_perusahaan" row='3'><?= $dataperusahaan->desk_perusahaan ?></textarea>
                                            </div>

                                        </div>

                                    <?php } else { ?>
                                        <div class="row">
                                            <div class='col-md-6'>
                                                <div class="form-group">
                                                    <label>Nama Perusahaan</label>
                                                    <input class="form-control" placeholder="Nama Perusahaan" type="text" name="nama_perusahaan" value='<?= $dataperusahaan->nama_perusahaan; ?>' disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Negara</label>
                                                    <input class="form-control" placeholder="Negara" type="text" name="negara_perusahaan" value='<?= $dataperusahaan->negara_perusahaan; ?>' disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <input class="form-control" placeholder="Provinsi" type="text" name="prov_perusahaan" value='<?= $dataperusahaan->provinsi_perusahaan; ?>' disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Perusahaan</label>
                                                    <input class="form-control" placeholder="Email Perusahaan" type="email" name="email_perusahaan" value='<?= $dataperusahaan->email_perusahaan; ?>' disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gambar2">Logo</label>
                                                    <!-- <input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload"> -->
                                                    <br>

                                                    <img src="../img/logo-perusahaan/<?php
                                                    if (empty($dataperusahaan->logo)) {
                                                        echo "nodoc.jpg";
                                                    } else {
                                                        echo $dataperusahaan->logo;
                                                    }
                                                    ?>" id="gambar_nodin2" style="width: 150px; height:150px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
                                                    <output id="gambar_nodin2"></output>
        <!--                                                <input type="file" name="logo" id="preview_gambar2" class="btn btn-info" value="<?= $dataperusahaan->logo ?>"/>-->

                                                    <script>
                                                        function bacaGambar2(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function(e)
                                                                {
                                                                    $('#gambar_nodin2').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>
                                                    <script>
                                                        $("#preview_gambar2").change(function() {
                                                            bacaGambar2(this);
                                                        });
                                                    </script> 


                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kontak Perusahaan</label>
                                                    <input class="form-control" placeholder="Kontak Perusahaan" type="number" name="kontak_perusahaan" value='<?= $dataperusahaan->kontak_perusahaan; ?>' disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Perusahaan</label>
                                                    <textarea class='form-control' name="alamat_perusahaan" row='3' disabled><?= $dataperusahaan->alamat_perusahaan ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jabatan di Perusahaan</label>
                                                    <input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan" value='<?= $get->jabatan ?>' disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Website Perusahaan</label>
                                                    <input class="form-control" placeholder="Website" type="text" name="web_perusahaan" value='<?= $dataperusahaan->website ?>' disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label>Deskripsi Perusahaan</label>
                                                    <textarea class='form-control' name="deskp_perusahaan" row='3' disabled><?= $dataperusahaan->desk_perusahaan ?></textarea>
                                                </div>

                                            </div>

                                        <?php } ?>
                                        <div class="col-md-12">

                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                                Ubah Perusahaan
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>


<!--                                <script>
                                    $(':radio').click(function(event) {
                                        var id = $(this).data('id');
                                        $('#' + id).addClass('none').siblings().removeClass('none');
                                    });
                                </script>
                                <style>
                                    .none {
                                        display:none;
                                    }
                                </style>-->

                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Ubah Perusahaan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method='post' action=''>
                                                <div class="form-group">
                                        <!--<select name="perusahaan" class="form-control">
                                                <option value='1'>Sudah ada</option>
                                                <option value='2'>Buat Baru</option>
                                        </select>-->
                                                    <div class="radio radio-primary">

                                                        <label>
                                                            <input type="radio"  name='perusahaan' value='1' data-id="last" id="optionsRadios1" <?php
                                                            if ($get->perusahaan == "ada") {
                                                                echo 'checked';
                                                            }
                                                            ?>><span class="circle"></span>
                                                            Perusahaan Sudah Ada
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-primary">
                                                        <label>
                                                            <input type="radio" name='perusahaan' value='2' data-id="new" id="optionsRadios1"<?php
                                                            if ($get->perusahaan == "baru") {
                                                                echo 'checked';
                                                            }
                                                            ?> /><span class="circle"></span>
                                                            Perusahaan Baru
                                                        </label>
                                                    </div> 

                                                </div>	
                                                <div id="last" class="none">
                                                    <hr>

                                                    <div class="row">
                                                        <div class='col-md-6'>
                                                            <div class="form-group">
                                                                <label>Nama Perusahaan</label>
                                                                <input class="form-control" placeholder="Nama Perusahaan" type="text" name="nama_perusahaan" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Negara</label>
                                                                <input class="form-control" placeholder="Negara" type="text" name="negara_perusahaan" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Provinsi</label>
                                                                <input class="form-control" placeholder="Provinsi" type="text" name="prov_perusahaan" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email Perusahaan</label>
                                                                <input class="form-control" placeholder="Email Perusahaan" type="email" name="email_perusahaan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gambar2">Logo</label>
                                                                <!-- <input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload"> -->
                                                                <br>
                                                                <img src="../img/logo-perusahaan/<?php
                                                                if (empty($dataperusahaan->logo)) {
                                                                    echo "nodoc.jpg";
                                                                } else {
                                                                    echo $dataperusahaan->logo;
                                                                }
                                                                ?>" id="gambar_nodin3" style="width: 150px; height:150px;" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
                                                                <output id="gambar_nodin3"></output>
                                                                <input type="file" name="logo_new" id="preview_gambar3" class="btn btn-info"/>
                                                                <script>
                                                                    function bacaGambar3(input) {
                                                                        if (input.files && input.files[0]) {
                                                                            var reader = new FileReader();
                                                                            reader.onload = function(e)
                                                                            {
                                                                                $('#gambar_nodin3').attr('src', e.target.result);
                                                                            }
                                                                            reader.readAsDataURL(input.files[0]);
                                                                        }
                                                                    }
                                                                </script>
                                                                <script>
                                                                    $("#preview_gambar3").change(function() {
                                                                        bacaGambar3(this);
                                                                    });
                                                                </script> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Kontak Perusahaan</label>
                                                                <input class="form-control" placeholder="Kontak Perusahaan" type="number" name="kontak_perusahaan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat Perusahaan</label>
                                                                <textarea class='form-control' name="alamat_perusahaan" row='3'></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jabatan di Perusahaan</label>
                                                                <input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Website Perusahaan</label>
                                                                <input class="form-control" placeholder="Website" type="text" name="web_perusahaan">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Deskripsi Perusahaan</label>
                                                                <textarea class='form-control' name="deskp_perusahaan" row='3'></textarea>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button name='simpan-psh' class='btn btn-success btn-lg'>Simpan Perusahaan</button>
                                                    </div>
                                                </div>
                                                <div id="new" class="none">
                                                    <hr>

                                                    <div class="form-group">
                                                        <label>Nama Perusahaan</label>
                                                        <select class="form-control" name="perusahaan-ada">

                                                            <?php
                                                            $querypshada = mysql_query("select * from perusahaan");
                                                            while ($pshada = mysql_fetch_object($querypshada)) {
                                                                echo "<option value='$pshada->id_perusahaan'>$pshada->nama_perusahaan - $pshada->provinsi_perusahaan</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jabatan di Perusahaan</label>
                                                        <input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan_ada">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button name='simpan-psh' class='btn btn-success btn-lg'>Simpan Perusahaan</button>
                                                    </div>


                                                </div>
                                            </form>
                                        </div>
                                        <script>
                                            $(':radio').click(function(event) {
                                                var id = $(this).data('id');
                                                $('#' + id).addClass('none').siblings().removeClass('none');
                                            });
                                        </script>
                                        <style>
                                            .none {
                                                display:none;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <?php
                        if (isset($_POST['simpan-psh'])) {
                            $psh = $_POST['perusahaan'];
                            $getidpsh = $_POST['perusahaan-ada'];
                            $jb_p = $_POST['jabatan_perusahaan'];
                            $jb_p_ada = $_POST['jabatan_perusahaan_ada'];
                            $nm_p = $_POST['nama_perusahaan'];
                            $ngr_p = $_POST['negara_perusahaan'];
                            $prv_p = $_POST['prov_perusahaan'];
                            $em_p = $_POST['email_perusahaan'];
                            $ktk_p = $_POST['kontak_perusahaan'];
                            $web_p = $_POST['web_perusahaan'];
                            $almt_p = mysql_escape_string($_POST['alamat_perusahaan']);
                            $desk_p = mysql_escape_string($_POST['deskp_perusahaan']);
                            if ($psh == "1") {
                                $tambah = "update employer set id_perusahaan = '$getidpsh' , jabatan = '$jb_p_ada', perusahaan = 'ada' where id_employer = '$idemp'";
                                $query = mysql_query($tambah);
                            } elseif ($psh == "2") {
                                $sql = mysql_query("select max(id_perusahaan) as id from `perusahaan`");
                                $data = mysql_fetch_array($sql);
                                $kodeawal = substr($data['id'], 6, 3); //ambil string mulai dari karakter ke 10 sampe 8 digit ke belakang
                                $tambahkode = $kodeawal + 1; //string yang sdh diambil ditambah1
                                $awal = 'PSH';
                                $date = date("y");
                                if ($tambahkode < 10) {
                                    $kode = $awal . $date . '000'; // mencetak komponen id terdiri dari idsekolah+$date+"0000"
                                    $kodejadi = $kode . $tambahkode; //kode hasil 
                                } elseif ($tambahkode < 100) {
                                    $kode = $awal . $date . '00';
                                    $kodejadi = $kode . $tambahkode;
                                } elseif ($tambahkode < 1000) {
                                    $kode = $awal . $date . '0';
                                    $kodejadi = $kode . $tambahkode;
                                } else {
                                    $kode = $awal . $date . "";
                                    $kodejadi = $kode . $tambahkode;
                                }
                                $idpsh = $kodejadi;
                                $tambahpshbaru = "INSERT INTO perusahaan values('$idpsh','$nm_p','$ngr_p','$prv_p','$em_p','$ktk_p','$almt_p','$web_p','$desk_p','','$idemp')";
                                $querypsh = mysql_query($tambahpshbaru);
                                $tambah = "update employer set id_perusahaan = '$idpsh' , perusahaan = 'baru',jabatan = '$jb_p' where id_employer = '$idemp'";
                                $query = mysql_query($tambah);
                                
                                
                                $sizefoto = $_FILES['logo_new']['size'];
                                $maxsize = 700000;

                                if (!empty($logoimg)) {
                                    if (($sizefoto >= $maxsize)) {

                                        echo "<script>alert('File Gambar harus kurang dari 700 KB, ukuran sekarang $sizefoto');</script>";
                                        die();
                                    } else {
                                        $logoimg = $_FILES['logo_new']['name'];
                                        $sqlupdate = "update perusahaan set logo = '$logoimg' where id_perusahaan = '$idpsh'";
                                        $update = mysql_query($sqlupdate);
                                        $folder = "../img/logo-perusahaan/";
                                        $data = $folder . basename($logoimg);
                                        $move = move_uploaded_file($_FILES['logo_new']['tmp_name'], $data);
                                    }
                                }
                                if ($query) {
                                    echo
                                    '
							<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Perusahaan diubah
							</div>
							<meta http-equiv="refresh" content= "1;URL=?detail=' . $idemp . '"/> 
							';
                                }
                            }
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    </section>
                    </aside>
                    </body>
                </div>		
            </div>