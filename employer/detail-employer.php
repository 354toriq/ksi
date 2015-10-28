	
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
            <form method="post" enctype="multipart/form-data">
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
                                                        echo "nodoc.jpg";
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
                                $sql = "update employer set nama = '$nama' , jnsklmn = '$kelamin' , tgllhr = '$tgllahir' , alamat = '$alamat' , foto = '$fotoemp' , pendidikan = '$pdkn' , jenjang = '$jenjang' ,  password = '$password' , email = '$email' , telp = '$kontak' where id_employer = '$idemp' ";
                                $query_update = mysql_query($sql);
                            }
                            ?>
                            <div role="tabpanel" class="tab-pane" id="perusahaan">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <!--<select name="perusahaan" class="form-control">
                                            <option value='1'>Sudah ada</option>
                                            <option value='2'>Buat Baru</option>
                                    </select>-->
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio"  name='perusahaan' value='1' data-id="last" id="optionsRadios1" <?php
                                                if ($get->perusahaan = "Ada") {
                                                    echo 'checked';
                                                }
                                                ?>><span class="circle"></span>
                                                Perusahaan Sudah Ada
                                            </label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name='perusahaan' value='2' data-id="new" id="optionsRadios1"<?php
                                                if ($get->perusahaan = "Baru") {
                                                    echo 'checked';
                                                }
                                                ?> /><span class="circle"></span>
                                                Perusahaan Baru
                                            </label>
                                        </div> 

                                    </div>						
                                </div>			

                                <hr />
                                <div class="col-md-12">
                                    <div id="last" class="none">
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
                                    <div id="new" class="none">
                                        <div class="col-md-12">
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
                                                <input class="form-control" placeholder="Jabatan" type="text" name="jabatan_perusahaan">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                <button name='simpan-psh' class='btn btn-success btn-lg'>Simpan Perusahaan</button>
                                </div>
                                
                                <script>
                                    $(':radio').change(function(event) {
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

                            </form>
                            <?php
                            if (isset($_POST['simpan-psh'])) {

                                $psh = $_POST['perusahaan'];


                                $getidpsh = $_POST['perusahaan-ada'];
                                $jb_p = $_POST['jabatan_perusahaan'];
                                $nm_p = $_POST['nama_perusahaan'];
                                $ngr_p = $_POST['negara_perusahaan'];
                                $prv_p = $_POST['prov_perusahaan'];
                                $em_p = $_POST['email_perusahaan'];
                                $ktk_p = $_POST['kontak_perusahaan'];
                                $web_p = $_POST['web_perusahaan'];
                                $almt_p = mysql_escape_string($_POST['alamat_perusahaan']);
                                $desk_p = mysql_escape_string($_POST['deskp_perusahaan']);
                                if ($psh == "1") {
                                    $tambah = "update employer set id_perusahaan = '$getidpsh' and jabatan = '$jb_p' where id_employer = '$idemp'";
                                    $query = mysql_query($tambah);
                                } elseif ($psh == "2") {
                                    $tambahpshbaru = "INSERT INTO perusahaan values('','$nm_p','$ngr_p','$prv_p','$em_p','$ktk_p','$almt_p','$web_p','$desk_p','','')";
                                    echo $tambahpshbaru;
                                    $querypsh = mysql_query($tambahpshbaru);
                                    $selpsh = mysql_query("select * from perusahaan order by 'id_perusahaan' desc");
                                    $getpsh = mysql_fetch_object($selpsh);
                                    $getidpsh = $getpsh->id_perusahaan;
                                    $tambah = "update employer set id_perusahaan = '$getidpsh' where id_employer = '$idemp'";
                                    $query = mysql_query($tambah);
                                    
                                }

                                if ($query) {

                                    echo
                                    '
							<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Employer berhasil ditambahkan !
							</div>
							<meta http-equiv="refresh" content= "1;URL=?detail=$idemp"/> 
							';
                                } else {
                                    echo $tambah;
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
