<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Employer | Daftar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <?php
    include 'include/dependency.php';
    include 'include/database.php';
    ?>
    <script type="text/javascript" src="../dependency/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../dependency/datepicker/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dependency/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../dependency/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
</head>
</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if (match)
                var color = match[1];
            if (color) {
                $('body').removeClass(function(index, css) {
                    return (css.match(/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});

        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">


    <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
    <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
    <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
    <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> 

    <!--<![endif]-->



    <br>
    <br><br>
    <div class="container">


        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">

                    <h3 class="panel-title">Pendaftaran Employer</h3>
                </div>
                <div class="panel-body">
                    <br>
                    <div class="row">
                        <form action="" method='post' enctype="multipart/form-data" >
                            <div class='col-md-6'>
                                <fieldset>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" placeholder="Nama Panjang  ...  " type="text" name='nama' required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="kelamin" id="optionsRadios1" value="Pria" checked=""><span class="circle"></span><span class="check"></span>
                                                Pria
                                            </label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="kelamin" id="optionsRadios2" value="Wanita"><span class="circle"></span><span class="check"></span>
                                                Wanita
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group date form_date "  data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" name="tgllahir" placeholder='Tgl Lahir'>
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
                                        <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input class="form-control" placeholder="Telp.   " type="number" name='kontak' required>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pendidikan Akhir</label>
                                    <select name='pendidikan' class="form-control">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan</label>
                                    <input class="form-control"  type="text"   name='jenjang' placeholder="Nama Sekolah / Universitas - Kelas / Jurusan">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control"  type="email"  name='email'  placeholder="email@email.com">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control"  type="password"  name='password'  placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="file" class="btn btn-default" name="Filegambar" id="filesToUpload">
                                    <br>
                                    <div class="row col-sm-12">	
                                        <output id="filesInfo"></output>
                                    </div>
                                    <script>
                                        function fileSelect(evt) {
                                            if (window.File && window.FileReader && window.FileList && window.Blob) {
                                                var files = evt.target.files;
                                                var divOne = document.getElementById('filesInfo');
                                                var result = '';
                                                var file;
                                                for (var i = 0; file = files[i]; i++) {
                                                    // if the file is not an image, continue
                                                    if (!file.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    reader = new FileReader();
                                                    reader.onload = (function(tFile) {
                                                        return function(evt) {
                                                            var div = document.createElement('div');
                                                            divOne.innerHTML = '<img id="img_prev" style="width: 250px; height:300px;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
                                                            document.getElementById('filesInfo').appendChild(div);
                                                        };
                                                    }(file));
                                                    reader.readAsDataURL(file);
                                                }
                                            } else
                                            {
                                                alert('The File APIs are not fully supported in this browser.');
                                            }
                                        }
                                        document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
                                    </script>

                                    <script>
                                        $('input[type=file]').bootstrapFileInput();
                                        $('.file-inputs').bootstrapFileInput();
                                    </script>
                                </div>

                            </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <!--<select name="perusahaan" class="form-control">
                                    <option value='1'>Sudah ada</option>
                                    <option value='2'>Buat Baru</option>
                            </select>-->
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio"  name='perusahaan' value='1' data-id="last" id="optionsRadios1"><span class="circle"></span>
                                        Perusahaan Sudah Ada
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name='perusahaan' value='2' data-id="new" id="optionsRadios1" /><span class="circle"></span>
                                        Perusahaan Baru
                                    </label>
                                </div> 

                            </div>						
                        </div>			
                    </div>			
                    <hr />
                    <div class="row">
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

                                <div class="form-group">
                                    <label for="gambar">Logo</label>
                                    <input type="file" class="btn btn-default" name="logo" id="filesToUploadLogo">
                                    <br>
                                    <div class="row col-sm-12">	
                                        <output id="filesInfoLogo"></output>
                                    </div>
                                    <script>
                                        function fileSelect(evt) {
                                            if (window.File && window.FileReader && window.FileList && window.Blob) {
                                                var files = evt.target.files;
                                                var divOne = document.getElementById('filesInfoLogo');
                                                var result = '';
                                                var file;
                                                for (var i = 0; file = files[i]; i++) {
                                                    // if the file is not an image, continue
                                                    if (!file.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    reader = new FileReader();
                                                    reader.onload = (function(tFile) {
                                                        return function(evt) {
                                                            var div = document.createElement('div');
                                                            divOne.innerHTML = '<img id="img_prevlogo" style="width: 250px; height:300px;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
                                                            document.getElementById('filesInfo').appendChild(div);
                                                        };
                                                    }(file));
                                                    reader.readAsDataURL(file);
                                                }
                                            } else
                                            {
                                                alert('The File APIs are not fully supported in this browser.');
                                            }
                                        }
                                        document.getElementById('filesToUploadLogo').addEventListener('change', fileSelect, false);
                                    </script>

                                    <script>
                                        $('input[type=file]').bootstrapFileInput();
                                        $('.file-inputs').bootstrapFileInput();
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
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <a href="masuk_employer.php" class="btn btn-success btn-lg">Kembali</a>&nbsp;
                            <button class="btn btn-primary btn-lg" name='btn-simpan'>&nbsp;Daftar Employer</button> 

                        </div>
                    </div>
                    </form>
<?php
if (isset($_POST['btn-simpan'])) {
    $sql = mysql_query("select max(id_employer) as id from `employer`");
    $data = mysql_fetch_array($sql);
    $kodeawal = substr($data['id'], 6, 4); //ambil string mulai dari karakter ke 10 sampe 8 digit ke belakang
    $tambahkode = $kodeawal + 1; //string yang sdh diambil ditambah1
    $awal = 'EMP';
    $date = date("y");
    if ($tambahkode < 10) {
        $kode = $awal . $date . '0000'; // mencetak komponen id terdiri dari idsekolah+$date+"0000"
        $kodejadi = $kode . $tambahkode; //kode hasil 
    } elseif ($tambahkode < 100) {
        $kode = $awal . $date . '000';
        $kodejadi = $kode . $tambahkode;
    } elseif ($tambahkode < 1000) {
        $kode = $awal . $date . '00';
        $kodejadi = $kode . $tambahkode;
    } else {
        $kode = $awal . $date . "0";
        $kodejadi = $kode . $tambahkode;
    }
    $idemp = $kodejadi;
    $nama = mysql_escape_string($_POST['nama']);
    $kelamin = $_POST['kelamin'];
    $tgllahir = $_POST['tgllahir'];
    $fotoemp = $_FILES['Filegambar']['name'];
    $pdkn = $_POST['pendidikan'];
    $jenjang = $_POST['jenjang'];
    $email = $_POST['email'];
    $kontak = $_POST['kontak'];
    $password = mysql_escape_string($_POST['password']);
    $alamat = mysql_escape_string($_POST['alamat']);
    $psh = $_POST['perusahaan'];
    $gambar = $_FILES['Filegambar']['name'];
    $sizefoto = $_FILES['Filegambar']['size'];
    $maxsize = 2000000;
    if (($sizefoto >= $maxsize) || ($sizefoto == 0)) {

        echo "<script>alert('File Gambar harus kurang dari 2 MB, ukuran sekarang $sizefoto');</script>";
        die();
    }
    $getidpsh = $_POST['perusahaan-ada'];
    $jb_p = $_POST['jabatan_perusahaan'];
    $nm_p = $_POST['nama_perusahaan'];
    $ngr_p = $_POST['negara_perusahaan'];
    $prv_p = $_POST['prov_perusahaan'];
    $em_p = $_POST['email_perusahaan'];
    $ktk_p = $_POST['kontak_perusahaan'];
    $web_p = $_POST['web_perusahaan'];
    $logo = $_FILES['logo']['name'];
    $almt_p = mysql_escape_string($_POST['alamat_perusahaan']);
    $desk_p = mysql_escape_string($_POST['deskp_perusahaan']);
    if ($psh == "1") {
        $tambah = "INSERT INTO employer values ('$idemp','$getidpsh','$nama','$kelamin','$tgllahir','$alamat','$gambar','$pdkn','$jenjang','$password','$email','$kontak','$jb_p','0')";
        $query = mysql_query($tambah);
        $empfotodir = "../img/profil-employer/";
        $datafotoemp = $empfotodir . basename($fotoemp);
        $move_fotoemp = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $datafotoemp);
    } elseif ($psh == "2") {
        $tambahpshbaru = "INSERT INTO perusahaan values('','$nm_p','$ngr_p','$prv_p','$em_p','$ktk_p','$almt_p','$web_p','$desk_p','')";
        $querypsh = mysql_query($tambahpshbaru);
        $selpsh = mysql_query("select * from perusahaan order by 'id_perusahaan' desc");
        $getpsh = mysql_fetch_object($selpsh);
        $getidpsh = $getpsh->id_perusahaan;
        $tambah = "INSERT INTO employer values ('$idemp','$getidpsh','$nama','$kelamin','$tgllahir','$alamat','$gambar','$pdkn','$jenjang','$password','$email','$kontak','$jb_p','0')";
        $query = mysql_query($tambah);
        $empfotodir = "../img/profil-employer/";
        $datafotoemp = $empfotodir . basename($fotoemp);
        $move_fotoemp = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $datafotoemp);
        $emplogodir = "../img/logo-perusahaan/";
        $datalogo = $emplogodir . basename($logo);
        $move_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $datalogo);
    }

    if ($query) {

        echo
        '
							<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="sr-only"></span>
							Pendaftaran anda berhasil diajukan, cek email untuk mengkonfirmasikan. 
							</div>
							<meta http-equiv="refresh" content= "6;URL=masuk_employer.php"/> 
							';
    } else {
        echo $tambah;
    }
}
?>
                    </tbody>
                    </table>
                </div>


            </div>

    </div>

</body></html>
